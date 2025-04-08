<?php

namespace App\Controllers;
use Config\App;

class Restore extends BaseController
{    
    public function restoreFile()
    {
        $hostname = $this->request->getPost('server');
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$database = $this->request->getPost('database');

        $backupDir = FCPATH . 'Import';
        // Ensure the directory exists, create it if it doesn't
        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);  // Make directory with write permissions
        }
		$filename = $_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],$backupDir .'/'. $filename);
		$filePath = $backupDir .'/'. $filename;
        $db = \Config\Database::connect([
            'hostname' => $hostname,
            'username' => $username,
            'password' => $password,
            'database' => $database,
            'DBDriver' => 'MySQLi',  // Assuming MySQL database
        ]);

        // Read the SQL file contents
        $sql = file_get_contents($filePath);

        // Split the SQL file into individual queries
        $queries = explode(";", $sql);

        // Loop through each query and execute it
        foreach ($queries as $query) {
            // Skip empty queries
            if (trim($query)) {
                $db->query($query);
            }
        }
        session()->setFlashdata('success','Successfully restored');
        return redirect()->to('recovert')->withInput();
    }
}