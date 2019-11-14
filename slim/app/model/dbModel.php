<?php
namespace Model\model;
use Medoo\Medoo;
use \Model\model\loadConfig as Config;
class dbModel extends medoo
{
    public function __construct(){ 
        $database=Config::get('mysql'); 
        parent::__construct($database);
    } 
}