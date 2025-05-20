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

    public function signUp()
    {
        return view('signup');
    }

    public function resetPassword()
    {
        return view('forgot-password');
    }

    public function newPassword()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'email'=>'required|valid_email|is_not_unique[users.Email]'
        ]);

        if(!$validation)
        {
            return view('forgot-password',['validation'=>$this->validator]);
        }
        else
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            function generate_string($input, $strength = 16) {
                $input_length = strlen($input);
                $random_string = '';
                for($i = 0; $i < $strength; $i++) {
                    $random_character = $input[mt_rand(0, $input_length - 1)];
                    $random_string .= $random_character;
                }
                return $random_string;
            }

            $password = generate_string($permitted_chars, 8);

            $accountModel = new \App\Models\userModel();
            $account = $accountModel->WHERE('Email',$this->request->getPost('email'))->first();
            $data = ['Password'=>Hash::make($password)];
            $accountModel->update($account['user_id'],$data);
            //send the new password
            $email = \Config\Services::email();
            $email->setTo($account['Email']);
            $email->setFrom("vinmogate@gmail.com","Digital Sports Hub");
            $imgURL = "assets/images/logo.jpg";
            $email->attach($imgURL);
            $cid = $email->setAttachmentCID($imgURL);
            $template = "<center>
            <img src='cid:". $cid ."' width='100'/>
            <table style='padding:20px;background-color:#ffffff;' border='0'><tbody>
            <tr><td><center><h1>New Password</h1></center></td></tr>
            <tr><td><center>Hi, ".$account['Fullname']."</center></td></tr>
            <tr><td><p><center>We hope this email finds you well. This message is to inform you that your password has been successfully reset. Your new password is: </center></p></td><tr>
            <tr><td><center><b>".$password."</b></center></td></tr>
            <tr><td><p><center>For security purposes, we strongly advise you to change this password once you log in to our website.</center></p></td></tr>
            <tr><td><p><center>If you did not request in Digital Sports Hub Website,<br/> please ignore this message or contact us @ digitalsportshub@gmail.com</center></p></td></tr>
            <tr><td><center>IT Support</center></td></tr></tbody></table></center>";
            $subject = "New Password | Digital Sports Hub";
            $email->setSubject($subject);
            $email->setMessage($template);
            $email->send();
            session()->setFlashdata('success','Great! Your new password was sent to your email');
            return redirect()->to('reset-password')->withInput();
        }
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

    public function register()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'name'=>'required|is_unique[users.Fullname]',
            'email'=>'required|valid_email|is_unique[users.Email]',
            'password'=>'required|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]',
            'confirm_password'=>'required|matches[password]|min_length[8]|max_length[12]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[0-9]/]',
            'agreement'=>'required'
        ]);
        if(!$validation)
        {
            return view('signup',['validation'=>$this->validator]);
        }
        else
        {
            $status = 0;$date = date('Y-m-d');
            $hash_password = Hash::make($this->request->getPost('password'));
            function generateRandomString($length = 64) {
                // Generate random bytes and convert them to hexadecimal
                $bytes = random_bytes($length);
                return substr(bin2hex($bytes), 0, $length);
            }
            $token_code = generateRandomString(64);
            //save
            $userModel = new \App\Models\userModel();
            $data = ['Email'=>$this->request->getPost('email'), 
                    'Password'=>$hash_password,
                    'Fullname'=>$this->request->getPost('name'),
                    'Status'=>$status,
                    'Token'=>$token_code,
                    'DateCreated'=>$date];
            $userModel->save($data);
            //send email activation link
            $email = \Config\Services::email();
            $email->setTo($this->request->getPost('email'));
            $email->setFrom("vinmogate@gmail.com","Digital Sports Hub");
            $imgURL = "assets/images/logo.jpg";
            $email->attach($imgURL);
            $cid = $email->setAttachmentCID($imgURL);
            $template = "<center>
            <img src='cid:". $cid ."' width='100'/>
            <table style='padding:20px;background-color:#ffffff;' border='0'><tbody>
            <tr><td><center><h1>Account Activation</h1></center></td></tr>
            <tr><td><center>Hi, ".$this->request->getPost('fullname')."</center></td></tr>
            <tr><td><p><center>Please click the link below to activate your account.</center></p></td><tr>
            <tr><td><center><b>".anchor('activate/'.$token_code,'Activate Account')."</b></center></td></tr>
            <tr><td><p><center>If you did not sign-up in Digital Sports Hub Website,<br/> please ignore this message or contact us @ digitalsportshub@gmail.com</center></p></td></tr>
            <tr><td><center>IT Support</center></td></tr></tbody></table></center>";
            $subject = "Account Activation | Digital Sports Hub";
            $email->setSubject($subject);
            $email->setMessage($template);
            $email->send();
            session()->setFlashdata('success','Great! Successfully sent activation link');
            return redirect()->to('/success/'.$token_code)->withInput();
        }
    }

    public function signout()
    {
        if(session()->has('loggedInUser'))
        {
            session()->remove('loggedInUser');
            session()->destroy();
            return redirect()->to('/?access=out')->with('fail', 'You are logged out!');
        }
    }

    public function registerNow()
    {
        $validation = $this->validate([
            'csrf_test_name'=>'required',
            'fullname'=>'required',
            'team_name'=>'required',
            'school'=>'required'
        ]);

        if(!$validation)
        {
            return $this->response->SetJSON(['error' => $this->validator->getErrors()]);
        }
        else
        {
            $registerModel = new \App\Models\teamRegistrationModel();
            $data = ['event_id'=>$this->request->getPost('event_id'),
                    'team_id'=>$this->request->getPost('team_id'),
                    'accountID'=>session()->get('loggedUser'),
                    'status'=>0];
            $registerModel->save($data);
            return $this->response->SetJSON(['success' => 'Successfully registered']);
        }
    }
}