<?php
function database()
{
    $database='library';
    $host='localhost';
    $user='root';
    $password="";

    $con=new mysqli($host,$user,$password,$database);
    if ($con->errno){
        return false;
    }else{
        return $con;
    }
}



