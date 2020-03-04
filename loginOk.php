<?php
  if(!isset($_POST['userId']) || !isset($_POST['userPw']))
  exit;


  session_start();
  $user_id = $_POST['userId'];
  $user_pw = $_POST['userPw'];

  $members = [
          'user1'=>['pw'=>'pw1', 'name'=>'김일구'],
          'user2'=>['pw'=>'pw2', 'name'=>'박이팔'],
          'user3'=>['pw'=>'pw3', 'name'=>'최삼칠'],
  ];
  if(!isset($members[$user_id])) {
  	echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
  	exit;
  }
  if($members[$user_id]['pw'] != $user_pw) {
  	echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
  	exit;
  }
  setcookie('user_id',$user_id,time()+(86400*30),'/');
  setcookie('user_name',$members[$user_id]['name'],time()+(86400*30),'/');

?>

<meta http-equiv='refresh' content='0;url=/index.php'>
