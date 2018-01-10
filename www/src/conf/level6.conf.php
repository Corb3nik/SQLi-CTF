<?php
  $servername = 'database';
  $username  = 'level6';
  $password = 'level6';
  $database = 'level6';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
