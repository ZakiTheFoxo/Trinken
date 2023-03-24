<?php 
    function Conectarse(){
        if(!$link = mysqli_connect("localhost", "TrinkenAdmin", "TkAdmin#1", "trinken")){
            die('Error Conectando: '.mysqli_connect_error());
            exit();
        }
        return $link;
    }  
    Conectarse();
?>