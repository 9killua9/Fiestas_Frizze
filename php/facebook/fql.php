<?php
    
    @require  ("facebook.php");

    $facebook = new facebook(array(
                'appId'     => '112771788880344',
                'secret'    => 'b4b04e7b62f48b48fe0cea2061a6c387',
                'fileUpload' => true,
              ));

    $facebook->setFileUploadSupport(true);
    $user_id = $facebook->getUser();

    // Datos de la foto 
    $img     = './3.jpg'; // Path to the photo on the local filesystem
    $message = 'Photo upload via the PHP SDK!';
?>
<html>
  <head></head>
  <body>

  <?
    $app_id = '112771788880344';
  $app_secret = 'b4b04e7b62f48b48fe0cea2061a6c387';
  $my_url = 'http://www.cerosandbox.com/facebook/pepsi/millon/php/facebook/fql.php';

  $code = $_REQUEST["code"];
 
 //auth user
 if(empty($code)) {
    $dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
    . $app_id . '&redirect_uri=' . urlencode($my_url) ;
    echo("<script>top.location.href='" . $dialog_url . "'</script>");
  }

  //get user access_token
  $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
    . $app_id . '&redirect_uri=' . urlencode($my_url) 
    . '&client_secret=' . $app_secret 
    . '&code=' . $code;

  $access_token = @file_get_contents($token_url);
  echo $access_token;

  // Run fql query
  $fql_query_url = 'https://graph.facebook.com/'
    . '/fql?q=SELECT+uid2+FROM+friend+WHERE+uid1=me()'
    . '&'.$access_token;
  $fql_query_result = file_get_contents($fql_query_url);
  $fql_query_obj = json_decode($fql_query_result, true);

  //display results of fql query
  echo '<pre>';
  print_r("query results:");
  print_r($fql_query_obj);
  echo '</pre>';

  // Run fql multiquery
  $fql_multiquery_url = 'https://graph.facebook.com/'
    . 'fql?q={"all+friends":"SELECT+uid2+FROM+friend+WHERE+uid1=me()",'
    . '"my+name":"SELECT+name+FROM+user+WHERE+uid=me()"}'
    . '&access_token=' . $access_token;
  $fql_multiquery_result = file_get_contents($fql_multiquery_url);
  $fql_multiquery_obj = json_decode($fql_multiquery_result, true);

  //display results of fql multiquery
  echo '<pre>';
  print_r("multi query results:");
  print_r($fql_multiquery_obj);
  echo '</pre>';
    if($user_id) {


    }

  ?>

  </body>
</html>