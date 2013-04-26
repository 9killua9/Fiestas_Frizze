<?php
/*******
 *
 *@author: Leandro Salar - Macerlo Salar
 *
 *******/

/*-- Inicio del documento
================================================== */
session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');

@include("funciones.php");

/*-- Funcion para conectame a la base 
================================================== */

$h 					= $_POST['h'];

switch ($h) 
{
    case 'donde':
            $_SESSION['donde'] = $_POST['donde'];
            $r['aviso'] = "modulo/home.php";

            echo json_encode($r);
    break;
    case 'cargaEventosHome':
        if(conectame())
        {
            $mes    = date('n');
            $anio   = date('Y');

 			$sql 	= 'SELECT * FROM _fiestas_frizze_eventos WHERE provincia = "'.$_SESSION['donde'].'" AND fecha LIKE "%'.$mes.'.'.$anio.'" AND habilitado = 1';
 			$res 	= @mysql_query($sql);
 			$i 		= 0;

 			while( $re = @mysql_fetch_array($res) )
 			{
 				$r[$i]['id'] 			= htmlentities($re['id']); 
 				$r[$i]['imagen'] 		= htmlentities($re['imagen']); 
 				$r[$i]['titulo'] 		= htmlentities($re['titulo']); 
 				$r[$i]['texto'] 		= htmlentities($re['texto']); 
 				$r[$i]['fecha'] 		= htmlentities($re['fecha']); 
 				$r[$i]['id_galeria'] 	= htmlentities($re['id_galeria']); 
 				$r[$i]['fotos'] 		= htmlentities($re['fotos']);
 				$r[$i]['provincia'] 	= htmlentities($re['provincia']);
 				$r[$i]['dir_boliche'] 	= htmlentities($re['dir_boliche']); 
 				$r[$i]['barrio'] 		= htmlentities($re['barrio']);
 				$i++;
 			}
 			$r['compara_mes'] 	= date('n');
 			$r['compara_dia'] 	= date('j');
 			$r['vueltas'] 	= $i;

 			echo json_encode($r);

            @mysql_close();
        }
    break;
    case 'cargaEventosHomeMes':
        if(conectame())
        {
            $mes    = $_POST['mes']; 
            $sql    = 'SELECT * FROM _fiestas_frizze_eventos WHERE provincia = "'.$_SESSION['donde'].'" AND habilitado = 1 AND fecha LIKE "%.'.$mes.'"';
            $res    = @mysql_query($sql);
            $i      = 0;

            while( $re = @mysql_fetch_array($res) )
            {
                $r[$i]['id']            = htmlentities($re['id']); 
                $r[$i]['imagen']        = htmlentities($re['imagen']); 
                $r[$i]['titulo']        = htmlentities($re['titulo']); 
                $r[$i]['texto']         = htmlentities($re['texto']); 
                $r[$i]['fecha']         = htmlentities($re['fecha']); 
                $r[$i]['id_galeria']    = htmlentities($re['id_galeria']); 
                $r[$i]['fotos']         = htmlentities($re['fotos']);
                $r[$i]['provincia']     = htmlentities($re['provincia']);
                $r[$i]['dir_boliche']   = htmlentities($re['dir_boliche']); 
                $r[$i]['barrio']        = htmlentities($re['barrio']);
                $i++;
            }
            $r['compara_mes']   = date('n');
            $r['compara_dia']   = date('j');
            $r['vueltas']   = $i;

            echo json_encode($r);

            @mysql_close();
        }
    break;
    case 'traeInfo':
        if(conectame())
        {
            $id     = $_POST['id']; 
            $sql    = 'SELECT * FROM _fiestas_frizze_eventos WHERE habilitado = 1 AND id = '.$id;
            $res    = @mysql_query($sql);
            $i      = 0;

            while( $re = @mysql_fetch_array($res) )
            {
                $r[$i]['id']            = htmlentities($re['id']); 
                $r[$i]['imagen']        = htmlentities($re['imagen']); 
                $r[$i]['titulo']        = htmlentities($re['titulo']); 
                $r[$i]['texto']         = htmlentities($re['texto']); 
                $r[$i]['fecha']         = htmlentities($re['fecha']); 
                $r[$i]['id_galeria']    = utf8_encode($re['id_galeria']); 
                $r[$i]['fotos']         = htmlentities($re['fotos']);
                $r[$i]['provincia']     = htmlentities($re['provincia']);
                $r[$i]['dir_boliche']   = htmlentities($re['dir_boliche']); 
                $r[$i]['barrio']        = htmlentities($re['barrio']);
                $i++;
            }
            $r['compara_mes']   = date('n');
            $r['compara_dia']   = date('j');
            $r['vueltas']   = $i;

            echo json_encode($r);

            @mysql_close();
        }
    break;
    case 'traeInfoParaElBuscador':
        if(conectame())
        {
            $buscador     = $_POST['buscar']; 
            /*$buscador = 'a';*/
            $sql    = 'SELECT * FROM  _fiestas_frizze_eventos WHERE texto LIKE "%'.$buscador.'%" OR titulo LIKE "%'.$buscador.'%" OR fecha LIKE "%'.$buscador.'%" OR provincia LIKE "%'.$buscador.'%" OR dir_boliche LIKE "%'.$buscador.'%" OR barrio LIKE "%'.$buscador.'%"';
            $res    = @mysql_query($sql);
            $i      = 0;

            while( $re = @mysql_fetch_array($res) )
            {
                $r[$i]['id']            = htmlentities($re['id']); 
                $r[$i]['imagen']        = htmlentities($re['imagen']); 
                $r[$i]['titulo']        = htmlentities($re['titulo']); 
                $r[$i]['texto']         = htmlentities($re['texto']); 
                $r[$i]['fecha']         = htmlentities($re['fecha']); 
                $r[$i]['id_galeria']    = htmlentities($re['id_galeria']); 
                $r[$i]['fotos']         = htmlentities($re['fotos']);
                $r[$i]['provincia']     = htmlentities($re['provincia']);
                $r[$i]['dir_boliche']   = htmlentities($re['dir_boliche']); 
                $r[$i]['barrio']        = htmlentities($re['barrio']);
                $i++;
            }
            $r['compara_mes']   = date('n');
            $r['compara_dia']   = date('j');
            $r['vueltas']   = $i;

            echo json_encode($r);

            @mysql_close();
        }
    break;
    case 'cargaEmail':
        if(conectame())
        {
            $email  = $_POST['email'];
            $id     = $_POST['id'];

            $sql = 'SELECT * FROM _fiestas_frizze_email WHERE email = "'.$email.'" AND evento = "'.$id.'"';
            $res = @mysql_query($sql);
            $can = @mysql_num_rows($res);

            if($can <= 0)
            {
                $sql = 'INSERT INTO `_fiestas_frizze_email`(`id`,`email`,`fecha`,`evento`,`activo`,`a`) 
                        VALUES 
                        ( NULL,"'.$email.'","'.date("j.n.Y").'","'.$id.'",1,1);';
                if(@mysql_query($sql))
                    $r['aviso'] = 'Muchas gracias !';
                else
                    $r['aviso'] = 'Evento no disponible';
            }
            else
                $r['aviso'] = 'Ya estas inscripto.';

            echo json_encode($r);

            @mysql_close();
        }
    break;
    default:
        # code...
        break;
}

?>