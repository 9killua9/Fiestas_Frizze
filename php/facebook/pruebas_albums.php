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
?>
<html>
<head>
</head>
<body>
<?php
  
  if($_POST['h'] == "siNene")
  {
    if($user_id) {

      try {

        $user_profile = $facebook->api('/me','GET');
        
        // Datos del usuario ( NO TRAE FOTO );
        echo '<pre style="display:none">'; 
        print_r($user_profile); 
        echo '</pre>';

        // Carga los Tokens
        $access_token = $facebook->getAccessToken();
        $params = array('access_token' => $access_token);
       
        $accounts = $facebook->api('/282147471900583/?fields=access_token', 'GET', $params);
        print_r($accounts);
        /*
        foreach($accounts['data'] as $account) 
        {
            if( $account['id'] == $fanpage || $account['name'] == $fanpage )
            {
                $fanpage_token = $account['access_token'];
            }
        }*/

       /* $fanpage = '282147471900583';*/
        $album_id ='1073741825';

        $photo = $facebook->api('282147471900583/albums/?fields=photos','GET');
        echo '<pre>'; 
        /*print_r($photo);*/
        echo '<img src="'.$photo['data'][0]['photos']['data'][0]['images'][0]['source'].'" />';

        $albArr = array(
            'name'=>'Album frizz',
            'message'=>'sarasa',
            'access_token' => $accounts['access_token']
            );

        $alb = $facebook->api('/282147471900583/albums/','POST',$albArr);
        print_r($alb);

         $img = $_FILES["archivo"]["tmp_name"];
        // Descomentar para subir la imagen al servidor y a un album
        $args = array(
           'message' => 'This photo was uploaded',
           'image' => '@'. $img,
           'aid' => $alb['id'],
           'no_story' => 1,
           'access_token' => $accounts['access_token']
          );

        echo'<pre>'; print_r($args);

        $photo = $facebook->api($alb['id'] . '/photos', 'post', $args);

      } catch(FacebookApiException $e) {
        $login_url = $facebook->getLoginUrl();

        echo'<script type="text/javascript">location.href="' . $login_url . '"</script>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $url    = $facebook->getLoginUrl(array(
         'scope'            => 'read_stream,user_photos,photo_upload,publish_stream,manage_pages',
         'redirect_uri' => 'http://www.reiatsu.com.ar/clientes/frizze/facebook/fiestas_frizze/php/facebook/pruebas_albums.php'
        ));

        echo'<script type="text/javascript">location.href="' . $url . '"</script>';
    }
  
  }// fin del if
  else
  {
    ?>
      <form name="form" action="pruebas_albums.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="h" value="siNene" />
        <input type="file" name="archivo" value="" />
        <input type="submit" value="enviar" />
      </form>
    <?php

  }
  ?>
  <script type="text/javascript">
  </script>
</body>
</html>