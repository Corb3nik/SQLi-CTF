<?php
  $servername = 'database';
  $username  = 'level3';
  $password = 'level3';
  $database = 'level3';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Unable to connect to MYSQL server");
  }
?>
