<?php
namespace Core;
use Medoo\Medoo;
use Core\loadConfig as Config;
class Db extends medoo
{
    public function __construct(){ 
        $database=Config::get('mysql'); 
        parent::__construct($database);
    } 
}