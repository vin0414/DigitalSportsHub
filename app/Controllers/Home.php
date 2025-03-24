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

    public function about()
    {
        return view('about');
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

        $data = ['title'=>$title,'total'=>$account,'player'=>$player,'team'=>$team,'shop'=>$shop];
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

    public function playerProfile($id)
    {
        $title = "Profile";
        //players
        $playerModel = new \App\Models\playerModel();
        $player = $playerModel->join('player_role','player_role.roleID=players.roleID')->WHERE('player_id',$id)->first();
        //recent match
        $matchModel = new \App\Models\matchModel();
        $match = $matchModel
            ->WHERE('team1_id',$player['team_id'])
            ->ORWHERE('team2_id',$player['team_id'])
            ->orderBy('match_id','DESC')->first();

        //stats
        $builder = $this->db->table('player_performance');
        $builder->select('*');
        $builder->WHERE('player_id',$id)->WHERE('match_id',$match['match_id']);
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
        $text = $this->request->getGet('search');
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
            $builder->WHERE('a.team_name',$text);
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
            $builder->WHERE('a.team_name',$text);
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
        return view('main/new-event');
    }

    public function upload()
    {
        $title = "Upload Video";
        $data = ['title'=>$title];
        return view('main/upload',$data);
    }

    public function manageVideos()
    {
        $title = "Videos";
        $data = ['title'=>$title];
        return view('main/manage-videos',$data);
    }

    public function goLive()
    {
        $title = "Go Live";
        $data = ['title'=>$title];
        return view('main/live',$data);
    }

    public function accounts()
    {
        $title = "Accounts";
        $data = ['title'=>$title];
        return view('main/accounts',$data);
    }

    public function newAccount()
    {
        $title = "New Account";
        //get the top 5 recently added
        $accountModel = new \App\Models\AccountModel();
        $account = $accountModel->orderBy('accountID', 'DESC')->limit(5)->findAll();

        $data = ['title'=>$title,'account'=>$account];
        return view('main/new-account',$data);
    }

    public function editAccount($id)
    {
        $title = "Edit Account";
        //get the account information
        $accountModel = new \App\Models\AccountModel();
        $account = $accountModel->WHERE('Token',$id)->first();
        $data = ['title'=>$title,'account'=>$account];
        return view('main/edit-account',$data);
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

    public function news()
    {
        $title = "News";
        $data = ['title'=>$title];
        return view('main/news',$data);
    }

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
                <input type="hidden" id="shop_id" name="shop_id" value="<?=$shop['shop_id']?>"/>
                <input type="hidden" id="longitude" name="longitude" value="<?=$shop['longitude']?>"/>
                <input type="hidden" id="latitude" name="latitude" value="<?=$shop['latitude']?>"/>
                <div class="col-lg-12">
                    <label class="form-label">Name of the Shop</label>
                    <input type="text" class="form-control" name="name_shop" value="<?=$shop['shop_name']?>" required/>
                    <div id="name_shop-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" required><?=$shop['address']?></textarea>
                    <div id="address-error" class="error-message text-danger text-sm"></div>
                </div>
                <div class="col-lg-12">
                    <label class="form-label">Website</label>
                    <input type="text" class="form-control" name="website" value="<?=$shop['website']?>" required/>
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

    public function recovery()
    {

    }

    public function settings()
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