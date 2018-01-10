<?php
  $servername = 'database';
  $username  = 'level1';
  $password = 'level1';
  $database = 'level1';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
