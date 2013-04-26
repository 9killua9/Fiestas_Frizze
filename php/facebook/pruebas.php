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
  function fetchUrl($url){

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_TIMEOUT, 20);

     $feedData = curl_exec($ch);
     curl_close($ch); 

     return $feedData;
  }
  /*
  if($user_id) {
*/
      try {

        $user_profile = $facebook->api('/me','GET');
        
        // Datos del usuario ( NO TRAE FOTO );
        echo '<pre style="display:none">'; 
        print_r($user_profile); 
        echo '</pre>';

        // Carga los Tokens
        $access_token = $facebook->getAccessToken();
        $params = array('access_token' => $access_token);
        
       /* $fanpage = '282147471900583';*/
        $album_id ='1073741825';

        $photo = $facebook->api('reiatsutest/albums/?fields=photos','GET');
        echo '<pre>'; 
        /*print_r($photo);*/
        echo '<img src="'.$photo['data'][0]['photos']['data'][0]['images'][0]['source'].'" />';
/*
        $accounts = $facebook->api('/282147471900583/accounts', 'GET', $params);
        
        foreach($accounts['data'] as $account) 
        {
            if( $account['id'] == $fanpage || $account['name'] == $fanpage )
            {
                $fanpage_token = $account['access_token'];
            }
        }*/

        /*
        // Descomentar para subir la imagen al servidor y a un album
        $args = array(
           'message' => 'This photo was uploaded',
           'image' => '@' . $img,
           'aid' => $album_id,
           'no_story' => 1,
           'access_token' => $fanpage_token
          );

        echo'<pre>'; print_r($args);

        $photo = $facebook->api($album_id . '/photos', 'post', $args);

        if($photo['id'] != "")
        {
          $pictue = $facebook->api('/'.$photo['id']);
         */

      } catch(FacebookApiException $e) {
       /* $login_url = $facebook->getLoginUrl();

        echo'<script type="text/javascript">location.href="' . $login_url . '"</script>';
        error_log($e->getType());
        error_log($e->getMessage());*/
      }   
   /* } else {

      // No user, print a link for the user to login
      $url    = $facebook->getLoginUrl(array(
         'scope'            => 'read_stream',
         'redirect_uri' => 'http://www.reiatsu.com.ar/clientes/frizze/facebook/fiestas_frizze/php/facebook/pruebas.php'
        ));

        echo'<script type="text/javascript">location.href="' . $url . '"</script>';
    }*/

  ?>
  <script type="text/javascript">
  </script>
</body>
</html>