<?php

http_response_code(204);

if (isset($_GET['IRCOMMAND'])){

  # The remote commands are TCP messages in the form "IRCODE [message]"
  # message is sent as uri attribute
  $ircomm = "IRCODE " . $_GET['IRCOMMAND'] . "\r\n";
  sendCommand($ircomm);
  
}

if (isset($_GET['TELEPORT'])){

  # Teleport commands are TCP messages in the form "TELEPORT [message]"
  # message is sent as uri attribute
  $telecomm = "TELEPORT " . $_GET['TELEPORT'] . "\r\n";
  sendCommand($telecomm);

}

function sendCommand($command) {
  # The default tivo port is 31339, some may let you configure this
  $port = 31339;
  # The address will need to be changed to that of your tivo box
  $address = '192.168.0.6';

  # Create a TCP/IP socket.
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  if ($socket === false) {
      echo "unable to open socket to TIVO " . socket_strerror(socket_last_error()) . "\n";
  }

  # connect to the socket created above
  $conn_result = socket_connect($socket, $address, $port);
  if ($conn_result === false) {
      echo "Connect failed with reason: " . socket_strerror(socket_last_error($socket)) . "\n";
  }

  socket_write($socket, $command, strlen($command));

  # Write out the response. The JS remote does not use this, but useful for debug
  echo socket_read($socket, 2048);

  socket_close($socket);

}

?>
