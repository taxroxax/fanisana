<?php
/**
 * Created by PhpStorm.
 * User: RAJAONARILALA
 * Date: 04/07/18
 * Time: 21:53
 */

namespace App;


class Config {
    private static $_instance;

    private $settings = [];

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    private function __construct(){
        $this->settings = require __DIR__ . '/database.php';
    }

    public function get($key){
        if(isset($this->settings[$key])){
            return $this->settings[$key];
        }
    }


    public function getPdo(){
        try {
            $conf = Config::getInstance();
            $pdo = new \PDO(
                'mysql:host='.$conf->get('db_host').';dbname='.$conf->get('db_name'),
                $conf->get('db_user'),
                $conf->get('db_pass'),
                array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            return $pdo;

        } catch (\PDOException $ex) {
            print $ex->getMessage();
        }
    }
} 