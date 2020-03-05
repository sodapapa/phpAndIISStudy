<?php
  if(!isset($_POST['userId']) || !isset($_POST['userPw']))
  exit;

  require 'createConn.php';
  $user_id = $_POST['userId'];
  $user_pw = $_POST['userPw'];

  // $members = [
  //         'user1'=>['pw'=>'1', 'name'=>'김일구'],
  //         'user2'=>['pw'=>'2', 'name'=>'박이팔'],
  //         'user3'=>['pw'=>'3', 'name'=>'최삼칠'],
  // ];

  //  $data->userLoginId;
  $db = new DB();

  $userId  = $_POST['userId'];
  $userPw  = $_POST['userPw'];


  // $age = 18;

  $sql = 'SELECT
          COUNT(MANAGER_ID) as cnt
        FROM dycis_mobile.tm_user where 1=1 and MANAGER_LOGIN_ID = :userId  AND MANAGER_PWD = :userPw
        ';

  $stmt = $db->prepare($sql);
  $stmt->bindParam(':userId',$userId);
  $stmt->bindParam(':userPw',$userPw);

  $stmt->execute();
  $result = $stmt->fetchAll();

  //레코드셋에 row가 있는지 확인
  $i=0;
  $cntResult = 0;
  foreach($result as $row){
  //여기서 필요한 처리를 진행...
  // $row['COUNT(MANAGER_ID)'];
  // print_r($row);
  // print_r($row['0']);
  $cntResult = $row['0'];
  $i++;
  }

  if($cntResult <= 0 ) {
  	echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
  	exit;
  }else{
    $sql = 'SELECT
            *
          FROM dycis_mobile.tm_user where 1=1 and MANAGER_LOGIN_ID = :userId
          ';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId',$userId);
    // $stmt->bindParam(':userPw',$userPw);

    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach($result as $row){
    //여기서 필요한 처리를 진행...
    // $row['COUNT(MANAGER_ID)'];
    // print_r($row);
    // print_r();
    setcookie('user_email',$row['MANAGER_EMAIL'] ,time()+3600,'/');
    // $cntResult = $row['0'];
    $i++;
    }
  }

  setcookie('user_id',$userId ,time()+3600,'/');
?>

<meta http-equiv='refresh' content='0;url=/index.php'>
