<?php
namespace aitsydney;
class Database{
    protected $connection;
    public function _construct(){
        $this -> connection = mysqli_connect('localhost','user','password','data');
    }



}

?>