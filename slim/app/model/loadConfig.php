<?php
namespace Model\model;
class loadConfig {
    static $con;
     function  __construct(){
         self::$con=include(ROOT_PATH.'/lib/config.php'); 
     }
     static function get($key){
         $re=new self(); 
         return self::$con[$key];
     }
 
 }