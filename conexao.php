<?php 
    function conexao(){
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $bcd = 'pife';
    
        $con = new mysqli($host, $user, $password, $bcd);
    
        if($con){
            return $con;
        }else {
            echo $con->connect_error;
        }
    }
?>