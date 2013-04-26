<?php
/*******
 *
 *@author: Leandro Salar - Macerlo Salar
 *
 *******/
/*-- Funcion para conectar a la base 
================================================== */
function conectame()
{
    $host       ="190.228.29.195";
    $user       = "killua";
    $pass       = "alone999";
    $dataBase   = "_reiatsu_clientes";
    $r          = false;

    if( @mysql_connect($host,$user,$pass) )
    {
        if( @mysql_select_db($dataBase) )
            $r = true;
    }  
    
    return $r;
}
?>