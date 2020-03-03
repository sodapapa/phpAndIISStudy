<?php

class DB extends PDO    {
    private $host ='220.76.91.51:13306';
    private $user ='root';
    private $password ='gkrtns';
    private $database ='dycis_mobile';
    private $options =array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    function __construct($database ='dycis_mobile') {
        parent::__construct("mysql:host=$this->host;dbname=$database;charset=utf8",$this->user,$this->password ,$this->options);
    }
}



?>
