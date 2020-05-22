<?php
namespace Core;
use Medoo\Medoo;
use Core\loadConfig as Config;
class Db extends medoo
{
    private static $instance;  
    public function __construct(){ 
        $database=Config::get('mysql'); 
        parent::__construct($database);
    } 
    public static function table(){
       //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
       if(!(self::$instance['DB'] instanceof self)){
            self::$instance['DB'] = new self();
        }
        return self::$instance['DB'];
    } 
}