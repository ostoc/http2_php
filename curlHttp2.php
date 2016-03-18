<?php
  // if(!define('CURL_HTTP_VERSION_2_0')){
  //   define('CURL_HTTP_VERSION_2_0',3);
  // }

  $ch = curl_init("https://http2.akamai.com/");

  //define curl option
  curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_2_0);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);

  //execute curl
  curl_exec($ch);


  $result = curl_getinfo($ch);
  echo $result;

  curl_close($ch)

?>
