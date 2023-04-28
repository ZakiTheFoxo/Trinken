<?php 
    function Conectarse(){
        if(!$link = mysqli_connect("proydweb.com", "proydweb_p2023", "Dweb_2@23", "proydweb_p2023")){
            die('Error Conectando: '.mysqli_connect_error());
            exit();
        }
        return $link;
    } 
?>