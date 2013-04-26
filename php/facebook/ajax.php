<?php
  session_start();    
    @require  ("facebook.php");
    $facebook = new facebook(array(
                'appId'     => '308715275920663',
                'secret'    => '8c14ed60513cf332f68b57710278209b',
                'fileUpload' => true,
              ));
    $facebook->setFileUploadSupport(true);
    $user_id = $facebook->getUser();

    $h = $_POST['h'];

    switch ($h) {
      case 'traeFotos':
            // Carga los Tokens
            $access_token = $facebook->getAccessToken();
            $params = array('access_token' => $access_token);
              
            /* $fanpage = '282147471900583';*/
            $album_id ='367306926717970';

            $photo = $facebook->api('367306926717970/?fields=photos','GET');
            
            /*print_r($photo);*/
            $r['img']       = $photo['photos']['data'];
            $r['cantidad']  = count($photo['photos']['data']);
            $r['album']     = $album_id;
            $r['token']     = $params;
            $r['photo']     = $photo;
            
            echo json_encode($r);
      break;
      
      default:
        # code...
        break;
    }

?>