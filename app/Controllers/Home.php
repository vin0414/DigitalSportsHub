<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form']);
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
                return redirect()->to('dashboard');
            }
        }
    }

    public function logout()
    {
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

    public function fetchPlayers()
    {
        $title = "Players";
        $data = ['title'=>$title];
        return view('main/players',$data);
    }

    public function newPlayer()
    {

    }

    public function fetchTeams()
    {
        $title = "Teams";
        $data = ['title'=>$title];
        return view('main/teams',$data);
    }

    public function newTeam()
    {

    }

    public function fetchSchedules()
    {

    }

    public function newSchedule()
    {

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

    }

    public function recovery()
    {

    }

    public function systemLogs()
    {

    }

    public function myAccount()
    {

    }
}