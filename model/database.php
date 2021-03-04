<?php
  $dsn = 'mysql:host=localhost;dbname=assingment-project';
  $username ='root';

  try {
    $db = new PDO($dsn, $username);
  } catch (PDOException $e) {
    $error = "Σφάλμα στη βάση δεδομένων: ";
    $error .= $e->getMessage();
    include('view/error.php');
    exit();
  }