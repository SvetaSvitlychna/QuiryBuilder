<?php

class Connection{
   public static function make($config){

       return new PDO("{$config['connection']};dbname={$config['dbname']}", "{$config['user']}", "{$config['password']}");
        return $pdo;
    }
}
