<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function watchNow()
    {
        
    }

    public function auth()
    {
        return view('auth/login');
    }

    public function forgotPassword()
    {
        return view('auth/forgot-password');
    }

    public function checkAccount()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'email'=>'required|valid_email|is_not_unique[accounts.Email]',
            'password'=>'required|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]'
        ]);

        if(!$validation)
        {
            return view('auth/login',['validation'=>$this->validator]);
        }
        else
        {
            $accountModel = new \App\Models\AccountModel();
            $account = $accountModel->WHERE('Email',$this->request->getPost('email'))
                                    ->WHERE('Status',1)
                                    ->first();
            $checkPassword = Hash::check($this->request->getPost('password'),$account['Password']);
            if(!$checkPassword||empty($checkPassword))
            {
                session()->setFlashdata('fail','Invalid Password! Please try again');
                return redirect()->to('auth')->withInput();
            }
            else
            {
                session()->set('loggedUser', $account['accountID']);
                session()->set('fullname', $account['Fullname']);
                session()->set('role',$account['Role']);
                //logs
                date_default_timezone_set('Asia/Manila');
                $logModel = new \App\Models\logModel();
                $data = [
                        'date'=>date('Y-m-d H:i:s a'),
                        'accountID'=>session()->get('loggedUser'),
                        'activities'=>'Logged In',
                        'page'=>'login page'
                        ];        
                $logModel->save($data);
                return redirect()->to('dashboard');
            }
        }
    }

    public function logout()
    {
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = [
                'date'=>date('Y-m-d H:i:s a'),
                'accountID'=>session()->get('loggedUser'),
                'activities'=>'Logged Out',
                'page'=>'logout page'
                ];        
        $logModel->save($data);
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            session()->destroy();
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
        }
    }


    //pages
    public function dashboard()
    {
        $title = "Digital Sports Hub";
        //total user
        $accountModel = new \App\Models\AccountModel();
        $account = $accountModel->countAllResults();
        //players
        $playerModel = new \App\Models\playerModel();
        $player = $playerModel->countAllResults();
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->countAllResults();
        //shops
        $shopModel = new \App\Models\shopModel();
        $shop = $shopModel->countAllResults();
        //events
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->WHERE('status',1)->ORDERBY('event_id','DESC')->limit(5)->findAll();
        //count all approved events
        $totalEvents = $eventModel->WHERE('status',1)->countAllResults();
        //videos
        $videoModel = new \App\Models\videoModel();
        $video = $videoModel->countAllResults();
        //total views per day
        $builder = $this->db->table('views');
        $builder->select('date,SUM(total_view)total');
        $builder->groupBy('date');
        $views = $builder->get()->getResult();
        //views per video
        $builder = $this->db->table('views a');
        $builder->select(',b.file_name,SUM(a.total_view)total');
        $builder->join('videos b','b.video_id=a.video_id','LEFT');
        $builder->groupBy('a.video_id');
        $video_view = $builder->get()->getResult();
        //video trends


        $data = ['title'=>$title,'total'=>$account,'player'=>$player,
                'team'=>$team,'shop'=>$shop,'event'=>$event,
                'total_event'=>$totalEvents,'video'=>$video,
                'video_view'=>$video_view,'views'=>$views];
        return view('main/dashboard',$data);
    }

    public function fetchAthletes()
    {
        $title = "Athletes";
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->findAll();
        //players
        $builder = $this->db->table('players a');
        $builder->select('a.*,b.team_name,c.roleName');
        $builder->join('teams b','b.team_id=a.team_id','LEFT');
        $builder->join('player_role c','c.roleID=a.roleID','LEFT');
        $players = $builder->get()->getResult();

        $data = ['title'=>$title,'team'=>$team,'players'=>$players];
        return view('main/players',$data);
    }

    public function newAthlete()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "New Athlete";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();
            //team
            $teamModel = new \App\Models\teamModel();
            $team = $teamModel->findAll();

            $data = ['title'=>$title,'sports'=>$sports,'team'=>$team];
            return view('main/new-player',$data);
        }
        return redirect()->back(); 
    }

    public function playerProfile($id)
    {
        $title = "Profile";
        //players
        $playerModel = new \App\Models\playerModel();
        $player = $playerModel->join('player_role','player_role.roleID=players.roleID')->WHERE('player_id',$id)->first();
        //recent match
        $matchModel = new \App\Models\matchModel();
        $match = $matchModel
            ->WHERE('result<>','-')
            ->WHERE('team1_id',$player['team_id'])
            ->ORWHERE('team2_id',$player['team_id'])
            ->orderBy('match_id','DESC')->first();

        //stats
        $builder = $this->db->table('player_performance');
        $builder->select('*');
        $builder->WHERE('player_id',value: $id)->WHERE('match_id',$match['match_id']);
        $recentStats = $builder->get()->getResult();
        //all stats
        $sql = "SELECT stat_type,sum(stat_value)total FROM player_performance where player_id=:id: group by stat_type";
        $query = $this->db->query($sql,['id'=>$id]);
        $stats = $query->getResult();

        $data = ['title'=>$title,'player'=>$player,'recent'=>$recentStats,'stats'=>$stats];
        return view('main/player-profile',$data);
    }

    public function editProfile($id)
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Edit Profile";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();
            //team
            $teamModel = new \App\Models\teamModel();
            $team = $teamModel->findAll();
            //player
            $playerModel = new \App\Models\playerModel();
            $player = $playerModel->WHERE('player_id',$id)->first();

            $data = ['title'=>$title,'sports'=>$sports,'team'=>$team,'player'=>$player];
            return view('main/edit-profile',$data);
        }
        return redirect()->back();
    }

    public function editPlayer()
    {
        $playerModel = new \App\Models\playerModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'last_name'=>'required',
            'first_name'=>'required',
            'mi'=>'required',
            'sports'=>'required',
            'team'=>'required',
            'position'=>'required',
            'jersey_number'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'email'=>'required|valid_email',
            'height'=>'required',
            'weight'=>'required',
            'address'=>'required',
            'file'=>'uploaded[file]|is_image[file]|max_size[file,2048]|permit_empty'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            if(empty($file->getClientName()))
            {
                $data = ['team_id'=>$this->request->getPost('team'),
                        'first_name'=>$this->request->getPost('first_name'),
                        'last_name'=>$this->request->getPost('last_name'),
                        'mi'=>$this->request->getPost('mi'),
                        'date_of_birth'=>$this->request->getPost('date_of_birth'),
                        'sportsID'=>$this->request->getPost('sports'),
                        'roleID'=>$this->request->getPost('position'),
                        'jersey_num'=>$this->request->getPost('jersey_number'),
                        'gender'=>$this->request->getPost('gender'),
                        'email'=>$this->request->getPost('email'),
                        'height'=>$this->request->getPost('height'),
                        'weight'=>$this->request->getPost('weight'),
                        'address'=>$this->request->getPost('address')];
                $playerModel->update($this->request->getPost('player_id'),$data);
            }
            else
            {
                $file->move('admin/images/profile/',$originalName);
                $data = ['team_id'=>$this->request->getPost('team'),
                        'first_name'=>$this->request->getPost('first_name'),
                        'last_name'=>$this->request->getPost('last_name'),
                        'mi'=>$this->request->getPost('mi'),
                        'date_of_birth'=>$this->request->getPost('date_of_birth'),
                        'sportsID'=>$this->request->getPost('sports'),
                        'roleID'=>$this->request->getPost('position'),
                        'jersey_num'=>$this->request->getPost('jersey_number'),
                        'gender'=>$this->request->getPost('gender'),
                        'email'=>$this->request->getPost('email'),
                        'height'=>$this->request->getPost('height'),
                        'weight'=>$this->request->getPost('weight'),
                        'address'=>$this->request->getPost('address'),
                        'image'=>$originalName];
                $playerModel->update($this->request->getPost('player_id'),$data);
            }

            if ($this->request->getPost('agree') !== null)
            {
                //check if user already had the account
                $accountModel = new \App\Models\AccountModel();
                $account = $accountModel->WHERE('Email',$this->request->getPost('email'))->first();
                if(empty($account))
                {
                    function generateRandomString($length = 64) {
                        // Generate random bytes and convert them to hexadecimal
                        $bytes = random_bytes($length);
                        return substr(bin2hex($bytes), 0, $length);
                    }
                    $token_code = generateRandomString(64);
                    $fullname = $this->request->getPost('first_name').' '.$this->request->getPost('mi').' '.$this->request->getPost('last_name');
                    
                    $data = ['Email'=>$this->request->getPost('email'),
                            'Password'=>Hash::make('Abc12345'),
                            'Fullname'=>$fullname,
                            'Role'=>'End-user',
                            'Status'=>1,
                            'Token'=>$token_code,
                            'DateCreated'=>date('Y-m-d')];
                    $accountModel->save($data);
                }
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Update existing athlete',
                    'page'=>'Edit Athlete'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully save changes']);
        }
    }

    public function savePlayer()
    {
        $playerModel = new \App\Models\playerModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'last_name'=>'required',
            'first_name'=>'required',
            'mi'=>'required',
            'sports'=>'required',
            'team'=>'required',
            'position'=>'required',
            'jersey_number'=>'required',
            'gender'=>'required',
            'date_of_birth'=>'required',
            'email'=>'required|valid_email',
            'height'=>'required',
            'weight'=>'required',
            'address'=>'required',
            'file'=>'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,10240]',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            //save the profile
            $file->move('admin/images/profile/',$originalName);
            $data = ['team_id'=>$this->request->getPost('team'),
                    'first_name'=>$this->request->getPost('first_name'),
                    'last_name'=>$this->request->getPost('last_name'),
                    'mi'=>$this->request->getPost('mi'),
                    'date_of_birth'=>$this->request->getPost('date_of_birth'),
                    'sportsID'=>$this->request->getPost('sports'),
                    'roleID'=>$this->request->getPost('position'),
                    'jersey_num'=>$this->request->getPost('jersey_number'),
                    'gender'=>$this->request->getPost('gender'),
                    'email'=>$this->request->getPost('email'),
                    'height'=>$this->request->getPost('height'),
                    'weight'=>$this->request->getPost('weight'),
                    'address'=>$this->request->getPost('address'),
                    'image'=>$originalName];
            $playerModel->save($data);
            if ($this->request->getPost('agree') !== null)
            {
                function generateRandomString($length = 64) {
                    // Generate random bytes and convert them to hexadecimal
                    $bytes = random_bytes($length);
                    return substr(bin2hex($bytes), 0, $length);
                }
                $token_code = generateRandomString(64);
                $fullname = $this->request->getPost('first_name').' '.$this->request->getPost('mi').' '.$this->request->getPost('last_name');
                $accountModel = new \App\Models\AccountModel();
                $data = ['Email'=>$this->request->getPost('email'),
                        'Password'=>Hash::make('Abc12345'),
                        'Fullname'=>$fullname,
                        'Role'=>'End-user',
                        'Status'=>1,
                        'Token'=>$token_code,
                        'DateCreated'=>date('Y-m-d')];
                $accountModel->save($data);
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new athlete',
                    'page'=>'New Athlete'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function filterPlayers()
    {
        $team = $this->request->getGet('team');
        $text = "%".$this->request->getGet('search')."%";

        if(!empty($team) && empty($text))
        {
            $builder = $this->db->table('players a');
            $builder->select('a.*,b.team_name,c.roleName');
            $builder->join('teams b','b.team_id=a.team_id','LEFT');
            $builder->join('player_role c','c.roleID=a.roleID','LEFT');
            $builder->WHERE('a.team_id',$team);
            $players = $builder->get()->getResult();
            foreach($players as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/profile')?>/<?php echo $row->image ?>);width:100%;height:10rem;"></span>
            <h3 class="m-0 mb-1">
                <a href="<?=site_url('profile')?>/<?php echo $row->player_id ?>">
                    <?php echo $row->last_name ?>, <?php echo $row->first_name ?>
                    <?php echo $row->mi ?>
                </a>
            </h3>
            <div class="text-secondary"><?php echo $row->roleName ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->team_name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="mailto:<?php echo $row->email ?>" class="card-btn">
                <i class="ti ti-mail"></i>&nbsp;Email
            </a>
            <a href="<?=site_url('athletes/profile')?>/<?php echo $row->player_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Profile
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(!empty($team) && !empty($text))
        {
            $builder = $this->db->table('players a');
            $builder->select('a.*,b.team_name,c.roleName');
            $builder->join('teams b','b.team_id=a.team_id','LEFT');
            $builder->join('player_role c','c.roleID=a.roleID','LEFT');
            $builder->WHERE('a.team_id',$team);
            $builder->LIKE('a.last_name',$text);
            $players = $builder->get()->getResult();
            foreach($players as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/profile')?>/<?php echo $row->image ?>);width:100%;height:10rem;"></span>
            <h3 class="m-0 mb-1">
                <a href="<?=site_url('profile')?>/<?php echo $row->player_id ?>">
                    <?php echo $row->last_name ?>, <?php echo $row->first_name ?>
                    <?php echo $row->mi ?>
                </a>
            </h3>
            <div class="text-secondary"><?php echo $row->roleName ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->team_name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="mailto:<?php echo $row->email ?>" class="card-btn">
                <i class="ti ti-mail"></i>&nbsp;Email
            </a>
            <a href="<?=site_url('athletes/profile')?>/<?php echo $row->player_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Profile
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(empty($team) && !empty($text))
        {
            $builder = $this->db->table('players a');
            $builder->select('a.*,b.team_name,c.roleName');
            $builder->join('teams b','b.team_id=a.team_id','LEFT');
            $builder->join('player_role c','c.roleID=a.roleID','LEFT');
            $builder->LIKE('a.last_name',$text);
            $players = $builder->get()->getResult();
            foreach($players as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/profile')?>/<?php echo $row->image ?>);width:100%;height:10rem;"></span>
            <h3 class="m-0 mb-1">
                <a href="<?=site_url('profile')?>/<?php echo $row->player_id ?>">
                    <?php echo $row->last_name ?>, <?php echo $row->first_name ?>
                    <?php echo $row->mi ?>
                </a>
            </h3>
            <div class="text-secondary"><?php echo $row->roleName ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->team_name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="mailto:<?php echo $row->email ?>" class="card-btn">
                <i class="ti ti-mail"></i>&nbsp;Email
            </a>
            <a href="<?=site_url('athletes/profile')?>/<?php echo $row->player_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Profile
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
    }

    public function getPosition()
    {
        $val = $this->request->getGet('value');
        $roleModel = new \App\Models\roleModel();
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->WHERE('sportsID',$val)->first();
        $role = $roleModel->WHERE('sportsName',$sports['Name'])->findAll();
        foreach($role as $row)
        {
            ?>
<option value="<?php echo $row['roleID'] ?>"><?php echo $row['roleName'] ?></option>
<?php
        }
    }


    //teams
    public function fetchTeams()
    {
        $title = "Teams";
        //teams
        $builder = $this->db->table('teams a');
        $builder->select('a.*,b.Name');
        $builder->join('sports b','b.sportsID=a.sportsID','LEFT');
        $team = $builder->get()->getResult();
        //sports
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->findAll();

        $data = ['title'=>$title,'team'=>$team,'sports'=>$sports];
        return view('main/teams',$data);
    }

    public function filterTeam()
    {
        $category = $this->request->getGet('category');
        $text = "%".$this->request->getGet('search')."%";
        //conditions
        if(!empty($category) && empty($text))
        {
            $builder = $this->db->table('teams a');
            $builder->select('a.*,b.Name');
            $builder->join('sports b','b.sportsID=a.sportsID','LEFT');
            $builder->WHERE('a.sportsID',$category);
            $team = $builder->get()->getResult();
            foreach($team as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/team')?>/<?php echo $row->image ?>)"></span>
            <h3 class="m-0 mb-1"><a
                    href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>"><?php echo $row->team_name ?></a>
            </h3>
            <div class="text-secondary">COACH : <?php echo $row->coach_name ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->Name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="<?=site_url('teams/score')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Scoreboard
            </a>
            <a href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Details
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(!empty($category) && !empty($text))
        {
            $builder = $this->db->table('teams a');
            $builder->select('a.*,b.Name');
            $builder->join('sports b','b.sportsID=a.sportsID','LEFT');
            $builder->WHERE('a.sportsID',$category);
            $builder->LIKE('a.team_name',$text);
            $team = $builder->get()->getResult();
            foreach($team as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/team')?>/<?php echo $row->image ?>)"></span>
            <h3 class="m-0 mb-1"><a
                    href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>"><?php echo $row->team_name ?></a>
            </h3>
            <div class="text-secondary">COACH : <?php echo $row->coach_name ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->Name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="<?=site_url('teams/score')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Scoreboard
            </a>
            <a href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Details
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(empty($category) && !empty($text))
        {
            $builder = $this->db->table('teams a');
            $builder->select('a.*,b.Name');
            $builder->join('sports b','b.sportsID=a.sportsID','LEFT');
            $builder->LIKE('a.team_name',$text);
            $team = $builder->get()->getResult();
            foreach($team as $row)
            {
                ?>
<div class="col-md-6 col-lg-3">
    <div class="card">
        <div class="card-body p-4 text-center">
            <span class="avatar avatar-xl mb-3 rounded"
                style="background-image: url(<?=base_url('admin/images/team')?>/<?php echo $row->image ?>)"></span>
            <h3 class="m-0 mb-1"><a
                    href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>"><?php echo $row->team_name ?></a>
            </h3>
            <div class="text-secondary">COACH : <?php echo $row->coach_name ?></div>
            <div class="mt-3">
                <span class="badge bg-success-lt"><?php echo $row->Name ?></span>
            </div>
        </div>
        <div class="d-flex">
            <a href="<?=site_url('teams/score')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Scoreboard
            </a>
            <a href="<?=site_url('teams/details')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-address-book"></i>&nbsp;Details
            </a>
        </div>
    </div>
</div>
<?php
            }
        }
    }

    public function teamDetails($id)
    {
        $title = "Team Information";
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('team_id',$id)->first();
        //get the details
        $playerModel = new \App\Models\playerModel();
        $player = $playerModel->join('player_role','player_role.roleID=players.roleID')
                              ->WHERE('team_id',$id)->findAll();
        //sports
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->WHERE('sportsID',$team['sportsID'])->first();
        //matches
        $builder = $this->db->table('matches a');
        $builder->select('a.date,a.location,a.result,b.team_name as team1,c.team_name as team2');
        $builder->join('teams b','b.team_id=a.team1_id','LEFT');
        $builder->join('teams c','c.team_id=a.team2_id','LEFT');
        $builder->WHERE('a.team1_id',$id);
        $builder->orWhere('a.team2_id', $id);
        $builder->orderBy('a.date','DESC');
        $match = $builder->get()->getResult();
        //stats
        $builder = $this->db->table('team_stats');
        $builder->select('SUM(wins)win,SUM(losses)loss,SUM(draws)draw');
        $builder->WHERE('team_id',$id);
        $builder->groupBy('team_id');
        $stats = $builder->get()->getResult();
        //achievement
        $teamAchievementModel = new \App\Models\teamAchievementModel();
        $achievement = $teamAchievementModel->join('achievements','achievements.achievement_id=team_achievements.achievement_id')->WHERE('team_id',$id)->findAll();

        $data = ['title'=>$title,'team'=>$team,'player'=>$player,'sports'=>$sports,'match'=>$match,'stats'=>$stats,'achievement'=>$achievement];
        return view('main/team-details',$data);
    }

    public function teamResults($id)
    {
        $title = "Team Scoreboard";
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('team_id',$id)->first();
        //scores
        $builder = $this->db->table('team_stats a');
        $builder->select('a.*,b.Fullname,d.team_name as team1,e.team_name as team2');
        $builder->join('accounts b','b.accountID=a.coachID','LEFT');
        $builder->join('matches c','c.match_id=a.match_id','LEFT');
        $builder->join('teams d','d.team_id=c.team1_id','LEFT');
        $builder->join('teams e','e.team_id=c.team2_id','LEFT');
        $builder->WHERE('a.team_id',$id);
        $score = $builder->get()->getResult();

        $data = ['title'=>$title,'team'=>$team,'score'=>$score];
        return view('main/team-match',$data);
    }

    public function newTeam()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "New Team";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();
            //coach
            $accountModel = new \App\Models\AccountModel();
            $account = $accountModel->WHERE('Role','Coach')->findAll();
            //recently team added
            $teamModel = new \App\Models\teamModel();
            $team = $teamModel->orderBy('team_id', 'DESC')->limit(5)->findAll();

            $data = ['title'=>$title,'sports'=>$sports,'account'=>$account,'team'=>$team];
            return view('main/new-team',$data);
        }
        return redirect()->back();
    }

    public function saveTeam()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'sports_name'=>'required',
            'team'=>'required|is_unique[teams.team_name]',
            'coach'=>'required',
            'school'=>'required',
            'file'=>'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,10240]'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            //save the logo
            $file->move('admin/images/team/',$originalName);
            //save the data
            $teamModel = new \App\Models\teamModel();
            //get the id of the coach
            $accountModel = new \App\Models\AccountModel();
            $account = $accountModel->WHERE('accountID',$this->request->getPost('coach'))->first();
            $data = ['team_name'=>$this->request->getPost('team'),
                    'coach_name'=>$account['Fullname'],
                    'accountID'=>$account['accountID'],
                    'sportsID'=>$this->request->getPost('sports_name'),
                    'school'=>$this->request->getPost('school'),
                    'image'=>$originalName];
            $teamModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new team : '.$this->request->getPost('team'),
                    'page'=>'New Team'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }


    //events
    public function Events()
    {
        $title = "Events";
        $data = ['title'=>$title];
        return view('main/events',$data);
    }

    public function newEvent()
    {
        $title = "New Event";
        //events per account
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->WHERE('accountID',session()->get('loggedUser'))
                            ->orderBy('event_id', 'desc') 
                            ->limit(5)  // Limit to 5 records
                            ->findAll(); 

        $data = ['title'=>$title,'event'=>$event];
        return view('main/new-event',$data);
    }

    public function manageEvent()
    {
        $title = "Manage Event";
        //my request
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->WHERE('accountID',session()->get('loggedUser'))->findAll();

        $data = ['title'=>$title,'event'=>$event];
        return view('main/manage-event',$data);
    }

    public function cancelEvent()
    {
        $eventModel = new \App\Models\eventModel();
        $val = $this->request->getPost('value');
        $data = ['status'=>2];
        $eventModel->update($val,$data);
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = [
                'date'=>date('Y-m-d H:i:s a'),
                'accountID'=>session()->get('loggedUser'),
                'activities'=>'Cancelled the selected event',
                'page'=>'Manage Event'
                ];        
        $logModel->save($data);
        echo "success";        
    }

    public function acceptEvent()
    {
        $eventModel = new \App\Models\eventModel();
        $val = $this->request->getPost('value');
        $data = ['status'=>1];
        $eventModel->update($val,$data);
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = [
                'date'=>date('Y-m-d H:i:s a'),
                'accountID'=>session()->get('loggedUser'),
                'activities'=>'Accepted the selected event',
                'page'=>'Manage Event'
                ];        
        $logModel->save($data);
        echo "success";    
    }

    public function rejectEvent()
    {
        $eventModel = new \App\Models\eventModel();
        $val = $this->request->getPost('value');
        $data = ['status'=>2];
        $eventModel->update($val,$data);
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = [
                'date'=>date('Y-m-d H:i:s a'),
                'accountID'=>session()->get('loggedUser'),
                'activities'=>'Rejected the selected event',
                'page'=>'Manage Event'
                ];        
        $logModel->save($data);
        echo "success";    
    }

    public function fetchEvent()
    {
        $eventModel = new \App\Models\eventModel();
        $searchTerm = $_GET['search']['value'] ?? '';

        // Apply the search filter for the main query
        if ($searchTerm) {
            $eventModel->like('event_title', $searchTerm)
                            ->orLike('event_description', $searchTerm)
                            ->orLike('start_date', $searchTerm)
                            ->orLike('end_date', $searchTerm);
        }

        // Pagination: Get the 'start' and 'length' from the request (these are sent by DataTables)
        $limit = $_GET['length'] ?? 10;  // Number of records per page, default is 10
        $offset = $_GET['start'] ?? 0;   // Starting record for pagination, default is 0

        // Clone the model for counting filtered records, while keeping the original for data fetching
        $filteredeventModel = clone $eventModel;
        if ($searchTerm) {
            $filteredeventModel->like('event_title', $searchTerm)
                            ->orLike('event_description', $searchTerm)
                            ->orLike('start_date', $searchTerm)
                            ->orLike('end_date', $searchTerm);
        }

        // Fetch filtered records based on limit and offset
        $account = $eventModel->WHERE('status',0)->findAll($limit, $offset);

        // Count total records (without filter)
        $totalRecords = $eventModel->WHERE('status',0)->countAllResults();

        // Count filtered records (with filter)
        $filteredRecords = $filteredeventModel->WHERE('status',0)->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'event' => '<b>'.$row['event_title'].'</b><br/><label>'.$row['event_location'].'</label><br/><small>'.$row['event_description'].'</small>',
                'type' => htmlspecialchars($row['event_type'], ENT_QUOTES),
                'date' => $row['start_date'].'-'.$row['end_date'],
                'action' => '<span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <button type="button" class="dropdown-item accept" value="'.$row['event_id'].'"> Accept </button>
                                <button type="button" class="dropdown-item reject" value="'.$row['event_id'].'"> Reject </button>
                              </div>
                            </span>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveEvent()
    {
        $eventModel = new \App\Models\eventModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'event_title'=>'required',
            'event_description'=>'required',
            'event_location'=>'required',
            'event_type'=>'required',
            'from_date'=>'required',
            'to_date'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            if ($this->request->getPost('agree') !== null)
            {
                if(session()->get('role')=="Super-admin"||session()->get('role')=="Organizer")
                {
                    //direct save and approved
                    $data = ['accountID'=>session()->get('loggedUser'),
                            'event_title'=>$this->request->getPost('event_title'),
                            'event_description'=>$this->request->getPost('event_description'),
                            'event_location'=>$this->request->getPost('event_location'),
                            'event_type'=>$this->request->getPost('event_type'),
                            'start_date'=>$this->request->getPost('from_date'),
                            'end_date'=>$this->request->getPost('to_date'),
                            'status'=>1,
                            'registration'=>1,
                            'date'=>date('Y-m-d')];
                    $eventModel->save($data); 
                }
                else
                {
                    $data = ['accountID'=>session()->get('loggedUser'),
                            'event_title'=>$this->request->getPost('event_title'),
                            'event_description'=>$this->request->getPost('event_description'),
                            'event_location'=>$this->request->getPost('event_location'),
                            'event_type'=>$this->request->getPost('event_type'),
                            'start_date'=>$this->request->getPost('from_date'),
                            'end_date'=>$this->request->getPost('to_date'),
                            'status'=>0,
                            'registration'=>1,
                            'date'=>date('Y-m-d')];
                    $eventModel->save($data); 
                }
            }
            else
            {
                if(session()->get('role')=="Super-admin"||session()->get('role')=="Organizer")
                {
                    //direct save and approved
                    $data = ['accountID'=>session()->get('loggedUser'),
                            'event_title'=>$this->request->getPost('event_title'),
                            'event_description'=>$this->request->getPost('event_description'),
                            'event_location'=>$this->request->getPost('event_location'),
                            'event_type'=>$this->request->getPost('event_type'),
                            'start_date'=>$this->request->getPost('from_date'),
                            'end_date'=>$this->request->getPost('to_date'),
                            'status'=>1,
                            'registration'=>0,
                            'date'=>date('Y-m-d')];
                    $eventModel->save($data); 
                }
                else
                {
                    $data = ['accountID'=>session()->get('loggedUser'),
                            'event_title'=>$this->request->getPost('event_title'),
                            'event_description'=>$this->request->getPost('event_description'),
                            'event_location'=>$this->request->getPost('event_location'),
                            'event_type'=>$this->request->getPost('event_type'),
                            'start_date'=>$this->request->getPost('from_date'),
                            'end_date'=>$this->request->getPost('to_date'),
                            'status'=>0,
                            'registration'=>0,
                            'date'=>date('Y-m-d')];
                    $eventModel->save($data); 
                }
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new event',
                    'page'=>'New Event'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully submitted']);
        }
    }

    public function upload()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Upload Video";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();

            $data = ['title'=>$title,'sports'=>$sports];
            return view('main/upload',$data);
        }
        return redirect()->back();
    }

    public function playVideo($id)
    {
        $title = "Play Video";
        //video
        $videoModel = new \App\Models\videoModel();
        $video = $videoModel->WHERE('Token',$id)->first();
        //all videos
        $recent = $videoModel->WHERE('Token!=',$id)
                          ->orderBy('video_id','DESC')
                          ->limit(5)->findAll();

        $data = ['title'=>$title,'video'=>$video,'recent'=>$recent];
        return view('main/play',$data);
    }

    public function editVideo($id)
    {
        $title = "Edit Video";
        //video
        $videoModel = new \App\Models\videoModel();
        $video = $videoModel->WHERE('Token',$id)->first();
        //sports
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->findAll();

        $data = ['title'=>$title,'video'=>$video,'sports'=>$sports];
        return view('main/edit-video',$data);
    }

    public function modifyVideo()
    {
        $videoModel = new \App\Models\videoModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'title'=>'required',
            'category'=>'required',
            'details'=>'required',
            'date'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $id = $this->request->getPost('video_id');
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            if(empty($file->getClientName()))
            {
                //save data
                $data = ['file_name'=>$this->request->getPost('title'),
                        'description'=>$this->request->getPost('details'),
                        'sportName'=>$this->request->getPost('category'),
                        'date'=>$this->request->getPost('date'),
                    ];
                $videoModel->update($id,$data);
            }
            else
            {
                $file->move('admin/videos/',$originalName);
                //edit data
                $data = ['file_name'=>$this->request->getPost('title'),
                        'description'=>$this->request->getPost('details'),
                        'file'=>$originalName,
                        'sportName'=>$this->request->getPost('category'),
                        'date'=>$this->request->getPost('date'),
                    ];
                $videoModel->update($id,$data);
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Edit the selected video',
                    'page'=>'Upload'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully uploaded']);
        }
    }

    public function saveVideo()
    {
        $videoModel = new \App\Models\videoModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'title'=>'required',
            'category'=>'required',
            'details'=>'required',
            'date'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            //generate Token
            function generateRandomString($length = 16) {
                // Generate random bytes and convert them to hexadecimal
                $bytes = random_bytes($length);
                return substr(bin2hex($bytes), 0, $length);
            }
            $token_code = generateRandomString(16);
            //save the video
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            $file->move('admin/videos/',$originalName);
            //save data
            $data = ['file_name'=>$this->request->getPost('title'),
                    'description'=>$this->request->getPost('details'),
                    'accountID'=>session()->get('loggedUser'),
                    'file'=>$originalName,
                    'sportName'=>$this->request->getPost('category'),
                    'date'=>$this->request->getPost('date'),
                    'status'=>1,
                    'Token'=>$token_code
                ];
            $videoModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Uploaded new video',
                    'page'=>'Upload'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully uploaded']);
        }
    }

    public function manageVideos()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Videos";
            //videos
            $videoModel = new \App\Models\videoModel();
            $video = $videoModel->findAll();
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();

            $data = ['title'=>$title,'video'=>$video,'sports'=>$sports];
            return view('main/manage-videos',$data);
        }
        return redirect()->back();
    }

    public function goLive()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Live Streaming";
            //matches today
            $date = date('Y-m-d');
            $matchModel = new \App\Models\matchModel();
            $match = $matchModel->WHERE('date',$date)->findAll();
            
            $data = ['title'=>$title,'match'=>$match];
            return view('main/live',$data);
        }
        return redirect()->back();
    }

    public function filterVideos()
    {
        $category = $this->request->getGet('sport');
        $date = $this->request->getGet('date');
        $text = "%".$this->request->getGet('keyword')."%";
        
        $videoModel = new \App\Models\videoModel();
        if(!empty($category))
        {
            $videos = $videoModel->WHERE('sportName',$category);
        }
        if(!empty($category) && !empty($date))
        {
            $videos = $videoModel->WHERE('sportName',$category)->WHERE('date',$date);
        }
        if(!empty($category) && !empty($date) && empty($text))
        {
            $videos = $videoModel->WHERE('sportName',$category)
                                ->WHERE('date',$date)
                                ->LIKE('file_name',$text);
        }
        if(!empty($category) && empty($text))
        {
            $videos = $videoModel->WHERE('sportName',$category)
                                ->LIKE('file_name',$text);
        }
        if(!empty($date))
        {
            $videos = $videoModel->WHERE('date',$date);
        }

        if(!empty($date)&&!empty($text))
        {
            $videos = $videoModel->WHERE('date',$date)->LIKE('file_name',$text);
        }

        if(!empty($text))
        {
            $videos = $videoModel->LIKE('file_name',$text);
        }
        $result = $videos->findAll();
        foreach($result as $row)
        {
            ?>
<div class="col-sm-6 col-lg-4">
    <div class="card card-sm">
        <a href="<?=site_url('videos/play/')?><?=$row['Token']?>">
            <video src="<?=base_url('admin/videos/')?><?=$row['file']?>" class="card-img-top"></video>
        </a>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <span class="avatar avatar-2 me-3 rounded"
                    style="background-image: url(<?=base_url('assets/images/logo.jpg')?>);"></span>
                <div style="width:100%;">
                    <a href="<?=site_url('videos/play/')?><?=$row['Token']?>">
                        <?=substr($row['file_name'],0,40) ?>...
                    </a><br />
                    <small><?php echo substr($row['description'],0,50) ?>...</small>
                    <div class="text-secondary">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <?=date('M,d Y',strtotime($row['date']))?>
                            </div>
                            <div class="col-lg-6">
                                <a href="<?=site_url('videos/edit/')?><?=$row['Token']?>" style="float:right;">
                                    <i class="ti ti-edit"></i>&nbsp;Edit Video
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        }

    }

    //accounts
    public function accounts()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Accounts";
            $data = ['title'=>$title];
            return view('main/accounts',$data);
        }
        return redirect()->back();
    }

    public function newAccount()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "New Account";
            //get the top 5 recently added
            $accountModel = new \App\Models\AccountModel();
            $account = $accountModel->orderBy('accountID', 'DESC')->limit(5)->findAll();

            $data = ['title'=>$title,'account'=>$account];
            return view('main/new-account',$data);
        }
        return redirect()->back();
    }

    public function editAccount($id)
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Edit Account";
            //get the account information
            $accountModel = new \App\Models\AccountModel();
            $account = $accountModel->WHERE('Token',$id)->first();
            $data = ['title'=>$title,'account'=>$account];
            return view('main/edit-account',$data);
        }
        return redirect()->back();
    }

    public function saveAccount()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'fullname'=>'required',
            'email'=>'required|valid_email|is_unique[accounts.Email]',
            'role'=>'required',
            'status'=>'required'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            function generateRandomString($length = 64) {
                // Generate random bytes and convert them to hexadecimal
                $bytes = random_bytes($length);
                return substr(bin2hex($bytes), 0, $length);
            }
            $token_code = generateRandomString(64);
            $accountModel = new \App\Models\AccountModel();
            $data = ['Email'=>$this->request->getPost('email'),
                    'Password'=>Hash::make('Abc12345'),
                    'Fullname'=>$this->request->getPost('fullname'),
                    'Role'=>$this->request->getPost('role'),
                    'Status'=>$this->request->getPost('status'),
                    'Token'=>$token_code,
                    'DateCreated'=>date('Y-m-d')];
            $accountModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Register new user',
                    'page'=>'New Account'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully submitted']);
        }
    }

    public function updateAccount()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'fullname'=>'required',
            'email'=>'required|valid_email',
            'role'=>'required',
            'status'=>'required'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $accountModel = new \App\Models\AccountModel();
            $data = ['Email'=>$this->request->getPost('email'),
                    'Fullname'=>$this->request->getPost('fullname'),
                    'Role'=>$this->request->getPost('role'),
                    'Status'=>$this->request->getPost('status')];
            $accountModel->update($this->request->getPost('accountID'),$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Update account for '.$this->request->getPost('fullname'),
                    'page'=>'Edit Account'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function resetAccount()
    {
        $val = $this->request->getPost('value');
        $accountModel = new \App\Models\AccountModel();
        $data = ['Password'=>Hash::make('Abc12345')];
        $accountModel->update($val,$data);
        //logs
        date_default_timezone_set('Asia/Manila');
        $logModel = new \App\Models\logModel();
        $data = [
                'date'=>date('Y-m-d H:i:s a'),
                'accountID'=>session()->get('loggedUser'),
                'activities'=>'Reset password',
                'page'=>'Accounts'
                ];        
        $logModel->save($data);
        return $this->response->SetJSON(['success' => 'Successfully reset the account']);
    }

    public function fetchAccounts()
    {
        $accountModel = new \App\Models\AccountModel();
        $searchTerm = $_GET['search']['value'] ?? '';

        // Apply the search filter for the main query
        if ($searchTerm) {
            $accountModel->like('accountID', $searchTerm)
                            ->orLike('Email', $searchTerm)
                            ->orLike('Fullname', $searchTerm)
                            ->orLike('Role', $searchTerm);
        }

        // Pagination: Get the 'start' and 'length' from the request (these are sent by DataTables)
        $limit = $_GET['length'] ?? 10;  // Number of records per page, default is 10
        $offset = $_GET['start'] ?? 0;   // Starting record for pagination, default is 0

        // Clone the model for counting filtered records, while keeping the original for data fetching
        $filteredaccountModel = clone $accountModel;
        if ($searchTerm) {
            $filteredaccountModel->like('accountID', $searchTerm)
                            ->orLike('Email', $searchTerm)
                            ->orLike('Fullname', $searchTerm)
                            ->orLike('Role', $searchTerm);
        }

        // Fetch filtered records based on limit and offset
        $account = $accountModel->findAll($limit, $offset);

        // Count total records (without filter)
        $totalRecords = $accountModel->countAllResults();

        // Count filtered records (with filter)
        $filteredRecords = $filteredaccountModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'id' => $row['accountID'],
                'email' => htmlspecialchars($row['Email'], ENT_QUOTES),
                'fullname' => htmlspecialchars($row['Fullname'], ENT_QUOTES),
                'role' => htmlspecialchars($row['Role'], ENT_QUOTES),
                'status' => ($row['Status'] == 0) ? '<span class="badge bg-danger text-white">Inactive</span>' : 
                '<span class="badge bg-success text-white">Active</span>',
                'action' => ($row['Status'] == 1) 
                    ? '<a href="' . site_url("edit-account") . '/' . $row['Token'] . '" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i> Edit </a>&nbsp;<button type="button" class="btn btn-sm btn-secondary reset" value="' . $row['accountID'] . '"><i class="ti ti-refresh"></i> Reset </button>' 
                    : '<a href="' . site_url("edit-account") . '/' . $row['Token'] . '" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i> Edit </a>'
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    //news

    public function news()
    {
        $title = "News";
        //headlines
        $newsModel  = new \App\Models\newsModel();
        $news = $newsModel->orderBy('news_id','DESC')->limit(9)->findAll();

        $data = ['title'=>$title,'news'=>$news];
        return view('main/news',$data);
    }

    public function editPost($id)
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Edit Post";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();
            //news
            $newsModel = new \App\Models\newsModel();
            $news = $newsModel->WHERE('topic',$id)->first();

            $data = ['title'=>$title,'sports'=>$sports,'news'=>$news];
            return view('main/edit-post',$data);
        }
        return redirect()->back();
    }

    public function newPost()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "New Article";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();

            $data = ['title'=>$title,'sports'=>$sports];
            return view('main/new-post',$data);
        }
        return redirect()->back();
    }

    public function savePost()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'article'=>'required|is_unique[news.topic]',
            'author'=>'required',
            'date'=>'required',
            'category'=>'required',
            'details'=>'required',
            'file'=>'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,10240]'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $newsModel = new \App\Models\newsModel();
            if ($this->request->getPost('agree') !== null)
            {
                $file = $this->request->getFile('file');
                $originalName = date('YmdHis').$file->getClientName();
                //save the logo
                $file->move('admin/images/news/',$originalName);
                $details = str_replace('""','',$this->request->getPost('details'));

                $data = ['date'=>$this->request->getPost('date'),
                        'author'=>$this->request->getPost('author'),
                        'topic'=>$this->request->getPost('article'),
                        'news_type'=>$this->request->getPost('category'),
                        'details'=>$details,
                        'image'=>$originalName,
                        'headline'=>1,
                        'status'=>1,
                        'accountID'=>session()->get('loggedUser')];
                $newsModel->save($data);
            }
            else
            {
                $file = $this->request->getFile('file');
                $originalName = date('YmdHis').$file->getClientName();
                //save the logo
                $file->move('admin/images/news/',$originalName);
                $details = str_replace('""','',$this->request->getPost('details'));

                $data = ['date'=>$this->request->getPost('date'),
                        'author'=>$this->request->getPost('author'),
                        'topic'=>$this->request->getPost('article'),
                        'news_type'=>$this->request->getPost('category'),
                        'details'=>$details,
                        'image'=>$originalName,
                        'headline'=>0,
                        'status'=>1,
                        'accountID'=>session()->get('loggedUser')];
                $newsModel->save($data);
            }
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Posted news :'.$this->request->getPost('article'),
                    'page'=>'New Post'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully save and published']);
        }
    }

    public function modifyPost()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'article'=>'required',
            'author'=>'required',
            'date'=>'required',
            'category'=>'required',
            'details'=>'required',
            'status'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $newsModel = new \App\Models\newsModel();
            $news_id = $this->request->getPost('news_id');
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            $details = str_replace('""','',$this->request->getPost('details'));
            if ($this->request->getPost('agree') !== null)
            {
                //save the logo
                if(!empty($file->getClientName()))
                {
                    $file->move('admin/images/news/',$originalName);
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'image'=>$originalName,
                                'headline'=>1,
                                'status'=>$this->request->getPost('status'),
                            ];
                    $newsModel->update($news_id,$data);
                }
                else
                {
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'headline'=>1,
                                'status'=>$this->request->getPost('status'),
                            ];
                    $newsModel->update($news_id,$data);
                }
            }
            else
            {
                if(!empty($file->getClientName()))
                {
                    $file->move('admin/images/news/',$originalName);
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'image'=>$originalName,
                                'headline'=>0,
                                'status'=>$this->request->getPost('status'),
                            ];
                    $newsModel->update($news_id,$data);
                }
                else
                {
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'headline'=>0,
                                'status'=>$this->request->getPost('status'),
                            ];
                    $newsModel->update($news_id,$data);
                }
            }
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function saveDraft()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'article'=>'required',
            'author'=>'required',
            'date'=>'required',
            'category'=>'required',
            'details'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $newsModel = new \App\Models\newsModel();
            $file = $this->request->getFile('file');
            $originalName = date('YmdHis').$file->getClientName();
            $details = str_replace('""','',$this->request->getPost('details'));
            if ($this->request->getPost('agree') !== null)
            {
                //save the logo
                if(!empty($file->getClientName()))
                {
                    $file->move('admin/images/news/',$originalName);
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'image'=>$originalName,
                                'headline'=>1,
                                'status'=>3,
                                'accountID'=>session()->get('loggedUser')
                            ];
                    $newsModel->save($data);
                }
                else
                {
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'headline'=>1,
                                'status'=>3,
                                'accountID'=>session()->get('loggedUser')
                            ];
                    $newsModel->save($data);
                }
            }
            else
            {
                if(!empty($file->getClientName()))
                {
                    $file->move('admin/images/news/',$originalName);
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'image'=>$originalName,
                                'headline'=>0,
                                'status'=>3,
                                'accountID'=>session()->get('loggedUser')
                            ];
                    $newsModel->save($data);
                }
                else
                {
                    $data = [
                                'date'=>$this->request->getPost('date'),
                                'author'=>$this->request->getPost('author'),
                                'topic'=>$this->request->getPost('article'),
                                'news_type'=>$this->request->getPost('category'),
                                'details'=>$details,
                                'headline'=>0,
                                'status'=>3,
                                'accountID'=>session()->get('loggedUser')
                            ];
                    $newsModel->save($data);
                }
            }
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function filterNews()
    {
        $newsModel = new \App\Models\newsModel();
        $date = $this->request->getGet('date');
        $type = $this->request->getGet('type');
        if(!empty($date)&& empty($type))
        {
            $news = $newsModel->WHERE('date',$date)->findAll();
            foreach($news as $row)
            {
                ?>
<div class="col-sm-6 col-lg-4">
    <div class="card card-sm">
        <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>">
            <img src="<?=base_url('admin/images/news/')?><?=$row['image']?>" class="card-img-top"
                style="width: 100%; height: 200px;" />
        </a>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <span class="avatar avatar-2 me-3 rounded"
                    style="background-image: url(<?=base_url('assets/images/avatar.jpg')?>);"></span>
                <div style="width:100%;">
                    <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>"><?=$row['topic'] ?></a>
                    <div class="text-secondary">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <?=date('M,d Y',strtotime($row['date']))?>
                            </div>
                            <div class="col-lg-6">
                                <?php if($row['status']==1): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-primary text-white" style="float:right;">Published</span>
                                <?php elseif($row['status']==3): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-secondary text-white" style="float:right;">Draft</span>
                                <?php else : ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-danger text-white" style="float:right;">Archive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(!empty($date)&& !empty($type))
        {
            $news = $newsModel->WHERE('date',$date)->WHERE('status',$type)->findAll();
            foreach($news as $row)
            {
                ?>
<div class="col-sm-6 col-lg-4">
    <div class="card card-sm">
        <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>">
            <img src="<?=base_url('admin/images/news/')?><?=$row['image']?>" class="card-img-top"
                style="width: 100%; height: 200px;" />
        </a>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <span class="avatar avatar-2 me-3 rounded"
                    style="background-image: url(<?=base_url('assets/images/avatar.jpg')?>);"></span>
                <div style="width:100%;">
                    <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>"><?=$row['topic'] ?></a>
                    <div class="text-secondary">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <?=date('M,d Y',strtotime($row['date']))?>
                            </div>
                            <div class="col-lg-6">
                                <?php if($row['status']==1): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-primary text-white" style="float:right;">Published</span>
                                <?php elseif($row['status']==3): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-secondary text-white" style="float:right;">Draft</span>
                                <?php else : ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-danger text-white" style="float:right;">Archive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
            }
        }
        else if(empty($date)&& !empty($type))
        {
            $news = $newsModel->WHERE('status',$type)->findAll();
            foreach($news as $row)
            {
                ?>
<div class="col-sm-6 col-lg-4">
    <div class="card card-sm">
        <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>">
            <img src="<?=base_url('admin/images/news/')?><?=$row['image']?>" class="card-img-top"
                style="width: 100%; height: 200px;" />
        </a>
        <div class="card-body">
            <div class="d-flex align-items-center">
                <span class="avatar avatar-2 me-3 rounded"
                    style="background-image: url(<?=base_url('assets/images/avatar.jpg')?>);"></span>
                <div style="width:100%;">
                    <a href="<?=site_url('news/topic/')?><?=$row['topic'] ?>"><?=$row['topic'] ?></a>
                    <div class="text-secondary">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <?=date('M,d Y',strtotime($row['date']))?>
                            </div>
                            <div class="col-lg-6">
                                <?php if($row['status']==1): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-primary text-white" style="float:right;">Published</span>
                                <?php elseif($row['status']==3): ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-secondary text-white" style="float:right;">Draft</span>
                                <?php else : ?>
                                <a href="<?=site_url('news/edit')?>/<?=$row['topic'] ?>"
                                    style="float:right;margin-left:10px;"><i class="ti ti-edit"></i>&nbsp;Edit</a>
                                <span class="badge bg-danger text-white" style="float:right;">Archive</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
            }
        }
    }

    public function topic($id)
    {
        $title = "Topic";
        //topic
        $newsModel = new \App\Models\newsModel();
        $news = $newsModel->WHERE('topic',$id)->first();
        //recent
        $recent = $newsModel->WHERE('topic!=',$id)->orderBy('news_id','DESC')->limit(3)->findAll();

        $data = ['title'=>$title,'news'=>$news,'recent'=>$recent];
        return view('main/topic',$data);
    }

    //matches
    public function newMatch()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "New Match";
            //incoming matches 
            $today = date('Y-m-d');
            $NewDate=date('Y-m-d', strtotime('+3 days'));
            $builder = $this->db->table('matches a');
            $builder->select('a.*,b.team_name as team1,c.team_name as team2');
            $builder->join('teams b','b.team_id=a.team1_id','LEFT'); 
            $builder->join('teams c','c.team_id=a.team2_id','LEFT'); 
            $builder->WHERE('a.date>=',$today)->WHERE('a.date<=',$NewDate);
            $matches = $builder->get()->getResult();
            //team
            $teamModel = new \App\Models\teamModel();
            $team = $teamModel->findAll();
            
            $data = ['title'=>$title,'matches'=>$matches,'team'=>$team];
            return view('main/create-match',$data);
        }
        return redirect()->back();
    }

    public function allMatch()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "All Matches";
            //matches
            $builder = $this->db->table('matches a');
            $builder->select('a.*,b.team_name as team1,c.team_name as team2');
            $builder->join('teams b','b.team_id=a.team1_id','LEFT');
            $builder->join('teams c','c.team_id=a.team2_id','LEFT');
            $builder->groupBy('a.match_id');
            $matches = $builder->get()->getResult();

            $data = ['title'=>$title,'matches'=>$matches];
            return view('main/match',$data);
        }
        return redirect()->back();
    }

    public function saveMatch()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'date'=>'required',
            'time'=>'required',
            'team1'=>'required',
            'team2'=>'required',
            'location'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $matchModel = new \App\Models\matchModel();
            $data = [
                'date'=>$this->request->getPost('date'),
                'time'=>$this->request->getPost('time'),
                'team1_id'=>$this->request->getPost('team1'),
                'team1_score'=>0,
                'team2_id'=>$this->request->getPost('team2'),
                'team2_score'=>0,
                'location'=>$this->request->getPost('location'),
                'result'=>'-'
            ];
            $matchModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function scoreMatch($id)
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Match Details";
            //match
            $matchModel  = new \App\Models\matchModel();
            $match = $matchModel->WHERE('match_id',$id)->first();
            
            $data = ['title'=>$title,'match'=>$match];
            return view('main/scoreboard',$data);
        }
        return redirect()->back();
    }

    public function stats()
    {
        $performanceModel = new \App\Models\performanceModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'match_id'=>'required',
            'player'=>'required',
            'stat_type'=>'required',
            'value'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            //get the details of the match
            $matchModel = new \App\Models\matchModel();
            $match = $matchModel->WHERE('match_id',$this->request->getPost('match_id'))->first();
            //get the team and sports ID
            $playerModel = new \App\Models\playerModel();
            $player = $playerModel->WHERE('player_id',$this->request->getPost('player'))->first();
            
            $data = ['player_id'=>$this->request->getPost('player'),
                      'match_id'=>$match['match_id'],
                      'team_id'=>$player['team_id'],
                      'sportsID'=>$player['sportsID'],
                      'stat_type'=>$this->request->getPost('stat_type'),
                      'stat_value'=>$this->request->getPost('value'),
                      'date'=>$match['date'],
                      'description'=>'-'];
            $performanceModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    //shops
    public function shops()
    {
        $title = "Shops";
        //shops
        $shopModel = new \App\Models\shopModel();
        $shop = $shopModel->findAll();

        $data = ['title'=>$title,'shop'=>$shop];
        return view('main/shops',$data);
    }

    public function fetchShop()
    {
        $id = $this->request->getGet('value');
        $shopModel = new \App\Models\shopModel();
        $shop = $shopModel->WHERE('shop_id',$id)->first();
        if($shop)
        {
            ?>
<form method="POST" class="row g-3" id="frmEditShop">
    <?=csrf_field()?>
    <input type="hidden" id="shop_id" name="shop_id" value="<?=$shop['shop_id']?>" />
    <input type="hidden" id="longitude" name="longitude" value="<?=$shop['longitude']?>" />
    <input type="hidden" id="latitude" name="latitude" value="<?=$shop['latitude']?>" />
    <div class="col-lg-12">
        <label class="form-label">Name of the Shop</label>
        <input type="text" class="form-control" name="name_shop" value="<?=$shop['shop_name']?>" required />
        <div id="name_shop-error" class="error-message text-danger text-sm"></div>
    </div>
    <div class="col-lg-12">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" required><?=$shop['address']?></textarea>
        <div id="address-error" class="error-message text-danger text-sm"></div>
    </div>
    <div class="col-lg-12">
        <label class="form-label">Website</label>
        <input type="text" class="form-control" name="website" value="<?=$shop['website']?>" required />
        <div id="website-error" class="error-message text-danger text-sm"></div>
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary save">
            <i class="ti ti-device-floppy"></i>&nbsp;Save Changes
        </button>
    </div>
</form>
<?php
        }
    }

    public function editShop()
    {
        $shopModel = new \App\Models\shopModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'name_shop'=>'required',
            'address'=>'required',
            'website'=>'required'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['longitude'=>$this->request->getPost('longitude'),
                    'latitude'=>$this->request->getPost('latitude'),
                    'shop_name'=>$this->request->getPost('name_shop'),
                    'address'=>$this->request->getPost('address'),
                    'website'=>$this->request->getPost('website'),
                    'date'=>date('Y-m-d')];
            $shopModel->update($this->request->getPost('shop_id'),$data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Edit shop : '.$this->request->getPost('name_shop'),
                    'page'=>'Shops'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully applied changes']);
        }
    }

    public function shopLocation()
    {
        $shopModel = new \App\Models\shopModel();
        $shops = $shopModel->findAll();
        $locations = [];
        foreach($shops as $row)
        {
            $locations[] = ['latitude'=>$row['latitude'],
                            'longitude'=>$row['longitude'],
                            'shop_name' => $row['shop_name'],
                            'address' => $row['address'],
                            'website'=>$row['website']];
        }
        echo json_encode($locations);
    }

    public function saveShop()
    {
        $shopModel = new \App\Models\shopModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'name_shop'=>'required|is_unique[shops.shop_name]',
            'address'=>'required',
            'website'=>'required'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['longitude'=>$this->request->getPost('longitude'),
                    'latitude'=>$this->request->getPost('latitude'),
                    'shop_name'=>$this->request->getPost('name_shop'),
                    'address'=>$this->request->getPost('address'),
                    'website'=>$this->request->getPost('website'),
                    'date'=>date('Y-m-d')];
            $shopModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new shop : '.$this->request->getPost('name_shop'),
                    'page'=>'Shops'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    //settings

    public function recovery()
    {

    }

    public function settings()
    {
        if(session()->get('role')=="Super-admin" || session()->get('role')=="Organizer")
        {
            $title = "Settings";
            //sports
            $sportsModel = new \App\Models\sportsModel();
            $sports = $sportsModel->findAll();
            //logs
            $builder = $this->db->table('logs a');
            $builder->select('a.*,b.Fullname');
            $builder->join('accounts b','b.accountID=a.accountID','LEFT');
            $logs = $builder->get()->getResult();

            $data = ['title'=>$title,'sports'=>$sports,'logs'=>$logs];
            return view('main/settings',$data);
        }
        return redirect()->back();
    }

    public function saveSports()
    {
        $sportsModel = new \App\Models\sportsModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'sports'=>'required|is_unique[sports.Name]'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['Name'=>$this->request->getPost('sports'),'DateCreated'=>date('Y-m-d')];
            $sportsModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new sports',
                    'page'=>'Settings'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully saved']);
        }
    }

    public function fetchSports()
    {
        $sportsModel = new \App\Models\sportsModel();
        $searchTerm = $_GET['search']['value'] ?? '';

        // Apply the search filter for the main query
        if ($searchTerm) {
            $sportsModel->like('sportsID', $searchTerm)
                            ->orLike('Name', $searchTerm)
                            ->orLike('DateCreated', $searchTerm);
        }

        // Pagination: Get the 'start' and 'length' from the request (these are sent by DataTables)
        $limit = $_GET['length'] ?? 10;  // Number of records per page, default is 10
        $offset = $_GET['start'] ?? 0;   // Starting record for pagination, default is 0

        // Clone the model for counting filtered records, while keeping the original for data fetching
        $filteredsportsModel = clone $sportsModel;
        if ($searchTerm) {
            $filteredsportsModel->like('sportsID', $searchTerm)
                            ->orLike('Name', $searchTerm)
                            ->orLike('DateCreated', $searchTerm);
        }

        // Fetch filtered records based on limit and offset
        $account = $sportsModel->findAll($limit, $offset);

        // Count total records (without filter)
        $totalRecords = $sportsModel->countAllResults();

        // Count filtered records (with filter)
        $filteredRecords = $filteredsportsModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'id' => $row['sportsID'],
                'name' => htmlspecialchars($row['Name'], ENT_QUOTES),
                'date' => htmlspecialchars(date('Y-M-d',strtotime($row['DateCreated'])), ENT_QUOTES),
                'action' =>'<button type="button" class="btn btn-sm btn-danger remove" value="' . $row['sportsID'] . '"><i class="ti ti-copy-x"></i> Remove </button>' 
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveRole()
    {
        $roleModel = new \App\Models\roleModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'sports_name'=>'required',
            'role'=>'required|is_unique[player_role.roleName]'
        ]);
        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['roleName'=>$this->request->getPost('role'),
                    'sportsName'=>$this->request->getPost('sports_name'),
                    'DateCreated'=>date('Y-m-d')];
            $roleModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new player role',
                    'page'=>'Settings'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully saved']);
        }
    }

    public function fetchRole()
    {
        $roleModel = new \App\Models\roleModel();
        $searchTerm = $_GET['search']['value'] ?? '';

        // Apply the search filter for the main query
        if ($searchTerm) {
            $roleModel->like('roleID', $searchTerm)
                            ->orLike('roleName', $searchTerm)
                            ->orLike('sportsName', $searchTerm)
                            ->orLike('DateCreated', $searchTerm);
        }

        // Pagination: Get the 'start' and 'length' from the request (these are sent by DataTables)
        $limit = $_GET['length'] ?? 10;  // Number of records per page, default is 10
        $offset = $_GET['start'] ?? 0;   // Starting record for pagination, default is 0

        // Clone the model for counting filtered records, while keeping the original for data fetching
        $filteredroleModel = clone $roleModel;
        if ($searchTerm) {
            $filteredroleModel->like('roleID', $searchTerm)
                            ->orLike('roleName', $searchTerm)
                            ->orLike('sportsName', $searchTerm)
                            ->orLike('DateCreated', $searchTerm);
        }

        // Fetch filtered records based on limit and offset
        $account = $roleModel->findAll($limit, $offset);

        // Count total records (without filter)
        $totalRecords = $roleModel->countAllResults();

        // Count filtered records (with filter)
        $filteredRecords = $filteredroleModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'id' => $row['roleID'],
                'role' => htmlspecialchars($row['roleName'], ENT_QUOTES),
                'sports' => htmlspecialchars($row['sportsName'], ENT_QUOTES),
                'date' => htmlspecialchars(date('Y-M-d',strtotime($row['DateCreated'])), ENT_QUOTES),
                'action' =>'<button type="button" class="btn btn-sm btn-danger remove" value="' . $row['roleID'] . '"><i class="ti ti-copy-x"></i> Remove </button>' 
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function fetchAchievement()
    {
        $achievementModel = new \App\Models\achievementModel();
        $searchTerm = $_GET['search']['value'] ?? '';

        // Apply the search filter for the main query
        if ($searchTerm) {
            $achievementModel->like('title', $searchTerm)
                            ->orLike('type', $searchTerm)
                            ->orLike('description', $searchTerm)
                            ->orLike('criteria', $searchTerm);
        }

        // Pagination: Get the 'start' and 'length' from the request (these are sent by DataTables)
        $limit = $_GET['length'] ?? 10;  // Number of records per page, default is 10
        $offset = $_GET['start'] ?? 0;   // Starting record for pagination, default is 0

        // Clone the model for counting filtered records, while keeping the original for data fetching
        $filteredachievementModel = clone $achievementModel;
        if ($searchTerm) {
            $filteredachievementModel->like('title', $searchTerm)
                            ->orLike('type', $searchTerm)
                            ->orLike('description', $searchTerm)
                            ->orLike('criteria', $searchTerm);
        }

        // Fetch filtered records based on limit and offset
        $account = $achievementModel->findAll($limit, $offset);

        // Count total records (without filter)
        $totalRecords = $achievementModel->countAllResults();

        // Count filtered records (with filter)
        $filteredRecords = $filteredachievementModel->countAllResults();

        $response = [
            "draw" => $_GET['draw'],
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            'data' => [] 
        ];
        foreach ($account as $row) {
            $response['data'][] = [
                'title' => $row['name'],
                'type' => htmlspecialchars($row['type'], ENT_QUOTES),
                'description' => htmlspecialchars($row['description'], ENT_QUOTES),
                'criteria' => $row['criteria'],
                'action' =>'<button type="button" class="btn btn-sm btn-danger remove" value="' . $row['achievement_id'] . '"><i class="ti ti-copy-x"></i> Remove </button>' 
            ];
        }
        // Return the response as JSON
        return $this->response->setJSON($response);
    }

    public function saveAchievement()
    {
        $achievementModel = new \App\Models\achievementModel();
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'title'=>'required|is_unique[achievements.name]',
            'type'=>'required',
            'description'=>'required',
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $data = ['name'=>$this->request->getPost('title'),
                    'description'=>$this->request->getPost('description'),
                    'type'=>$this->request->getPost('type'),
                    'criteria'=>$this->request->getPost('criteria'),
                    'date_created'=>date('Y-m-d')];
            $achievementModel->save($data);
            //logs
            date_default_timezone_set('Asia/Manila');
            $logModel = new \App\Models\logModel();
            $data = [
                    'date'=>date('Y-m-d H:i:s a'),
                    'accountID'=>session()->get('loggedUser'),
                    'activities'=>'Added new achievement',
                    'page'=>'Settings'
                    ];        
            $logModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully added']);
        }
    }

    public function myAccount()
    {

    }
}