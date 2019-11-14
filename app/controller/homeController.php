<?php
namespace Controller\controller;
use Model\model\dbModel as Db;
class homeController
{
    public function home($req,$res,$args){
        echo 'it works!'; 
    } 
	public function list($req,$res,$args){
        echo 'This is list';
        $Db=new Db();
        $user=$Db->select("user",'*');
        var_dump($user); 
    } 
}