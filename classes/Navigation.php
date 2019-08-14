<?php
 namespace aitsydney;
 
 use aitsydney\Database;

 class Navigation extends Database{
     public $isAuthenticated = false;
     private $min_level = 0;
     private $max_level =1;
     public $navigation = array();

     public function __construct(){

         parent::__construct();
         $this -> initSession();
         if(isset($_SESSION['auth'])){
             $this -> isAuthenticated = true;
             $this ->  min_level = 1;
             $this -> max_level = 2;
         }
     }
     //$ this sign is used for variables


     private function initSession(){
         if(session_status()== PHP_SESSION_NONE ){  //it is to check the session has been started or not 
            session_start();
         }
     }

     public function getNavigation(){
         $nav_query ="
         select name , 
         url , 
         menu , 
         content
         from page
         where level >=?
         and level <= ?
         and active =1
         order by menu_order ASC
         ";
         $satement = $this -> connection -> prepare ( $nav_query);
         $satement -> bind_param( 'ii', $this -> min_level, $this -> max_level);
         try {
             if($satement -> execute() == false){
                 throw(new exception ('Query Error'));
             }
             else{
                 $result = $satement -> get_result();
                 $items = array();
                 While ( $row = $result -> fetch_assoc()){
                     array_push($items,$row);
                 }
                 $this -> navigation['items'] = $items;
                 $this -> navigation['active'] = basename ($_SERVER['PHP_SELF']);
             }
             return $this -> navigation;
         }
         catch(exception $e){
             echo $e -> getMessage();

         }
     }
 }

?>