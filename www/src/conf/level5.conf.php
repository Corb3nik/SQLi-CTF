<?php
  $servername = 'database';
  $username  = 'level5';
  $password = 'level5';
  $database = 'level5';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
