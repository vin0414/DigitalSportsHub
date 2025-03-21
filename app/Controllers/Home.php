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
        $data = ['title'=>$title];
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

    public function saveAthlete()
    {
        
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
            <a href="<?=site_url('teams/results')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Matches
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
            <a href="<?=site_url('teams/results')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Matches
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
            <a href="<?=site_url('teams/results')?>/<?php echo $row->team_id ?>" class="card-btn">
                <i class="ti ti-scoreboard"></i>&nbsp;Matches
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

    }

    public function teamResults($id)
    {

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
        return view('main/events');
    }

    public function newEvent()
    {
        return view('main/new-event');
    }

    public function upload()
    {

    }

    public function manageVideos()
    {

    }

    public function goLive()
    {

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

    public function myAccount()
    {

    }
}