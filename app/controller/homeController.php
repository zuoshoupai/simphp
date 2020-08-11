<?php
namespace App\controller;
use Core\Db;
use Slim\Views\PhpRenderer;
use App\model\userModel;
class homeController
{
    public function home($req,$response,$args){
        $renderer = new PhpRenderer('templates');
        $param=['title'=>99858,'content'=>'i love this'];
        return $renderer->render($response, "hello.php", $param);
    } 
	public function list($req,$res,$args){
        echo 'This is list'; 
		/*
        $user=Db::table()->select("booking_class",'*');
        var_dump($user); 
		*/
		$userModel=new userModel();
		$list=$userModel->list();
		var_dump($list);
		die;
    } 
}