<?php
namespace App\controller;
use Core\Db;
use Slim\Views\PhpRenderer;
class homeController
{
    public function home($req,$response,$args){
        $renderer = new PhpRenderer('templates');
        $param=['title'=>99858,'content'=>'i love this'];
        return $renderer->render($response, "hello.php", $param);
    } 
	public function list($req,$res,$args){
        echo 'This is list';
        $Db=new Db();
        $user=$Db->select("user",'*');
        var_dump($user); 
    } 
}