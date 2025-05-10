<?php

namespace App\Controllers;

class ChatController extends BaseController
{

    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }

    public function getMessages()
    {
        $builder = $this->db->table('chat_messages a');
        $builder->select("CONCAT(b.fullname,' : ', a.message)message,a.id, a.sender_id, b.user_id");
        $builder->join('users b','b.user_id=a.sender_id','LEFT'); 
        $builder->orderBy('a.id','ASC');
        $messages = $builder->get()->getResult();
        return $this->response->setJSON($messages);
    }

    public function sendMessage()
    {
        $sender_id = session()->get('loggedInUser');
        $message = $this->request->getPost('message');
        
        $chatModel = new \App\Models\chatModel;
        $chatModel->save(['sender_id'=>$sender_id,'message'=>$message]);

        return $this->response->setJSON(['status' => 'success']);
    }
}