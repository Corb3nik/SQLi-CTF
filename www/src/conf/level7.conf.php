<?php
  $servername = 'database';
  $username  = 'level7';
  $password = 'level7';
  $database = 'level7';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
