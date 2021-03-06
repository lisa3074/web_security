<?php
if(!isset($_SESSION)){
    session_start();
}
require_once(__DIR__.'/../db.php');


if(!isset($_SESSION['uuid'])){
    header('Location: /You need to log in');
     exit();
}
try{
  $q = $db->prepare('SELECT * FROM user WHERE uuid = :uuid LIMIT 1');
  $q->bindValue(':uuid', $_SESSION['uuid']);
  $q->execute();
  $user = $q->fetch();

//encrypting with CBC
$alg='AES-128-CBC';
$ciphertext = $user['note'];
$key="secretKey";
$note=openssl_decrypt($ciphertext, $alg, $key, 0, $user['iv']);
if(!$note){
    header("Location: /admin/Sorry, you have not saved a note");
    exit();
}
 header("Location: /admin/note/$note");
  exit();
}catch(PDOException $ex){
  echo $ex;
}