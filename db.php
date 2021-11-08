<?php
 require_once(__DIR__.'/pass/pass.php');
try{
  $sDatabaseUserName = 'sheclmzz_its_ma2';
  $sDatabasePassword = $pass;
  $sDatabaseConnection = "mysql:host=premium42.web-hosting.com; dbname=sheclmzz_its_mandatory2; charset=utf8mb4";
  $aDatabaseOptions = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  $db = new PDO( $sDatabaseConnection, $sDatabaseUserName, $sDatabasePassword, $aDatabaseOptions );
}catch( PDOException $e){
  echo '{status:0, message: cannot connect to database} '.$e;
  exit();
}  

/*  try{
  $sDatabaseUserName = 'sheclmzz_web_dev';
  $sDatabasePassword = $pass;
  $sDatabaseConnection = "mysql:host=premium42.web-hosting.com; dbname=sheclmzz_its_exam; charset=utf8mb4";
  $aDatabaseOptions = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  $db = new PDO( $sDatabaseConnection, $sDatabaseUserName, $sDatabasePassword, $aDatabaseOptions );
}catch( PDOException $e){
  echo '{status:0, message: cannot connect to database} '.$e;
  exit();
} */