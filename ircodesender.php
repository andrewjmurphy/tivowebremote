<?php

http_response_code(204);

if (isset($_GET['IRCOMMAND'])){

  echo "testtesttest";

  $port = 10002;
  $address = '127.0.0.1';

  /* Create a TCP/IP socket. */
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  if ($socket === false) {
      echo "unable to open socket to TIVO " . socket_strerror(socket_last_error()) . "\n";
  }

  $conn_result = socket_connect($socket, $address, $port);
  if ($conn_result === false) {
      echo "Connect failed with reason: " . socket_strerror(socket_last_error($socket)) . "\n";
  }

  $in = "IRCODE " . $_GET['IRCOMMAND'] . "\r\n";

  socket_write($socket, $in, strlen($in));

  echo socket_read($socket, 2048);

  socket_close($socket);
}
?>
