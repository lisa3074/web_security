<?php

require_once(__DIR__.'/../db.php');

if(!isset($_SESSION)){
  session_start();
}

 if( !$_POST['comment_text'] ){
  header('Location: /admin/You need to write something to send it...');
  exit();  
}else{
    echo 'The comment is saved';
}


//encrypting with CBC
$alg='AES-128-CBC';
//$iv=bin2hex(openssl_random_pseudo_bytes(openssl_cipher_iv_length(($alg))));
 $iv_len=openssl_cipher_iv_length($alg);
 
 //bin2hex => remember to use it to revert to a string
//$iv=bin2hex(openssl_random_pseudo_bytes($iv_len));
$comment_iv=bin2hex(openssl_random_pseudo_bytes(8));
//echo $iv;
$plaintext = $_POST['comment_text'];
$key="47062c85f9b1a4d27f50717951f58fa0";

 try{

  $q=$db->prepare("INSERT INTO comments (comment_text, comment_iv, user_id) VALUES (:comment_text, :comment_iv, :uuid)");

  $q->bindValue(':uuid', $_SESSION['uuid']);
  $q->bindValue(':comment_iv', $comment_iv);
  $q->bindValue(':comment_text', openssl_encrypt($plaintext, $alg, $key, 0, $comment_iv));
  $q->execute();

 header('Location: /admin/Your comment was saved!'); 

}catch(PDOException $ex){
  echo $ex;
} 