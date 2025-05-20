<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Coach extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['url','form','text']);
        $this->db = db_connect();
    }

    public function dashboard()
    {
        $title = "Overview";
        //teAM
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('accountID',session()->get('loggedUser'))->first();
        $playerModel = new \App\Models\playerModel();
        $totalPlayer = $playerModel->WHERE('team_id',$team['team_id'])->countAllResults();
        //stats
        $builder = $this->db->table('team_stats');
        $builder->select('SUM(wins)win,SUM(losses)loss,SUM(draws)draw');
        $builder->WHERE('team_id',$team['team_id']);
        $builder->groupBy('team_id');
        $stats = $builder->get()->getResult();
        //win
        $builder = $this->db->table('team_stats');
        $builder->select('IFNULL(SUM(wins),0)total');
        $builder->WHERE('team_id',$team['team_id']);
        $builder->groupBy('team_id');
        $winner = $builder->get()->getRow();
        if (!$winner) {
            $winner = (object)['total' => 0];
        }
        //loss
        $builder = $this->db->table('team_stats');
        $builder->select('IFNULL(SUM(losses),0)total');
        $builder->WHERE('team_id',$team['team_id']);
        $builder->groupBy('team_id');
        $loss = $builder->get()->getRow();
        if (!$loss) {
            $loss = (object)['total' => 0];
        }
        //match
        $builder = $this->db->table('matches a');
        $builder->select('a.date,a.location,a.result,b.team_name as team1,c.team_name as team2');
        $builder->join('teams b','b.team_id=a.team1_id','LEFT');
        $builder->join('teams c','c.team_id=a.team2_id','LEFT');
        $builder->WHERE('a.team1_id',$team['team_id']);
        $builder->orWhere('a.team2_id', $team['team_id']);
        $builder->orderBy('a.date','DESC')->limit(5);
        $match = $builder->get()->getResult();

        $data = ['title'=>$title,'totalPlayer'=>$totalPlayer,'stats'=>$stats,'match'=>$match,'win'=>$winner,'loss'=>$loss];
        return view('coach/dashboard',$data);
    }

    public function myTeam()
    {
        $title = "My Team";
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->findAll();
        //load my team 
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('accountID',session()->get('loggedUser'))->first();
        //events per account
        $eventModel = new \App\Models\eventModel();
        $event = $eventModel->orderBy('event_id', 'desc') 
                            ->limit(5)  // Limit to 5 records
                            ->findAll();

        $data = ['title'=>$title,'sports'=>$sports,'team'=>$team,'event'=>$event];
        return view('coach/my-team',$data);
    }

    public function myPlayers()
    {
        $title = 'My Players';
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->WHERE('accountID',session()->get('loggedUser'))->first();
        //players
        $builder = $this->db->table('players a');
        $builder->select('a.*,b.team_name,c.roleName');
        $builder->join('teams b','b.team_id=a.team_id','LEFT');
        $builder->join('player_role c','c.roleID=a.roleID','LEFT');
        $builder->WHERE('b.team_id',$team['team_id']);
        $players = $builder->get()->getResult();

        $data = ['title'=>$title,'players'=>$players];
        return view('coach/my-players',$data);
    }

    public function newPlayer()
    {
        $title = "New Player";
        //sports
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->findAll();
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->findAll();
        $data = ['title'=>$title,'sports'=>$sports,'team'=>$team];
        return view('coach/new-player',$data);
    }

    public function viewPlayer($id)
    {
        $title = "Player Information";
        //sports
        $sportsModel = new \App\Models\sportsModel();
        $sports = $sportsModel->findAll();
        //team
        $teamModel = new \App\Models\teamModel();
        $team = $teamModel->findAll();
        //information
        $playerModel = new \App\Models\playerModel();
        $player = $playerModel->WHERE('player_id',$id)->first();

        $data = ['title'=>$title,'player'=>$player,'sports'=>$sports,'team'=>$team,];
        return view('coach/view-player',$data);
    }

    public function mySchedule()
    {
        $title = "My Schedule";
        $data = ['title'=>$title];
        return view('coach/my-schedule',$data);
    }

    public function myAccount()
    {
        $title = "My Profile";
        //account
        $accountModel = new \App\Models\AccountModel();
        $account = $accountModel->WHERE('accountID',session()->get('loggedUser'))->first();
        $data = ['title'=>$title,'account'=>$account];
        return view('coach/my-account',$data);
    }
}