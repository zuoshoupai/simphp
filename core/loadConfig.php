<?php
namespace Core;
class loadConfig {
    static $con;
     function  __construct(){
         self::$con=include(ROOT_PATH.'/person/config.php'); 
     }
     static function get($key){
         $re=new self(); 
         $key_arr=explode('.',$key);
         if(count($key_arr)>1){  
            $res=self::$con[$key_arr[0]];
            for($i=1;$i<count($key_arr);$i++){ 
                if(isset($res[$key_arr[$i]])){
                    $res=$res[$key_arr[$i]];
                }else{
                    $res='';
                    break;
                } 
            }
            return $res;
         }else{
            return isset(self::$con[$key])?self::$con[$key]:'';
         } 
     }
 
 }
