<?php

namespace App\Controllers;
use App\Libraries\Hash;
class User extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }

    public function login()
    {
        return view('login');
    }

    public function validateUser()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'email'=>'required|valid_email|is_not_unique[users.Email]',
            'password'=>'required|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]'
        ]);

        if(!$validation)
        {
            return view('/login',['validation'=>$this->validator]);
        }
        else
        {
            $userModel = new \App\Models\userModel();
            $user = $userModel->WHERE('Email',$this->request->getPost('email'))
                              ->WHERE('Status',1)->first();
            $checkPassword = Hash::check($this->request->getPost('password'),$user['Password']);
            if(empty($checkPassword)||!$checkPassword)
            {
                session()->setFlashdata("fail","Invalid Email or Password");
                return redirect()->to('login')->withInput();
            }
            else
            {
                session()->set('loggedInUser', $user['user_id']);
                session()->set('fullname', $user['Fullname']);
                return redirect()->to('/');
            }
        }
    }
}