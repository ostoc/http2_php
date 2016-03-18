<?php

  # Use this script to test the cURL is working for HTTP2
  # Need to notice, in order to use HTTP2:
  # cURL >= 7.47.0
  # Destination Server should enable http2
  # PHP >= 5.5.24

  $ch = curl_init("https://http2.akamai.com/");

  //define curl option
  curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_2_0);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_NOBODY, 1);
  curl_setopt($ch, CURLOPT_VERBOSE, true);
  $verbose = fopen('log', 'w+');
  curl_setopt($ch, CURLOPT_STDERR, $verbose);

  //execute curl
  $result = curl_exec($ch);

  if ($result === FALSE) {
        printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
            htmlspecialchars(curl_error($ch)));
      }

  rewind($verbose);

  $verboseLog = stream_get_contents($verbose);

  // echo "Verbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";




  curl_close($ch)
?>
