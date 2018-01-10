<?php
  $servername = 'database';
  $username  = 'level4';
  $password = 'level4';
  $database = 'level4';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
