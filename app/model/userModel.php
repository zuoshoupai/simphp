<?php
namespace App\model;  
class userModel
{
     public function list(){
		 return array(
		   array('name'=>'张三','age'=>23),
		   array('name'=>'李四','age'=>33)
		 );
	 }
}