<?php
  if(!isset($_POST['userId']) || !isset($_POST['userPw']))
  exit;

  require 'createConn.php';

  $password =$_POST['userPw']; //$2y$12$Y4G0rHMogeLwpltLIEa/S.dtCLwe.XNdocQK5REUsQZw4G4jG2TqK

  const PASSWORD_COST = ['cost'=>12];// cost 의 기본 값은 10

  /* 암호화 */
  // $hash = password_hash($password , PASSWORD_DEFAULT, PASSWORD_COST);

  //echo $hash;
  /* 패스워드 검증 */

  //  $data->userLoginId;
  $db = new DB();

  $userId  = $_POST['userId'];
  // $userPw  = $hash;

  $sql = 'SELECT
          MANAGER_PWD
        FROM dycis_mobile.tm_user where 1=1 and MANAGER_LOGIN_ID = :userId limit 1' ;  //   AND MANAGER_PWD = :userPw';


  $stmt = $db->prepare($sql);
  $stmt->bindParam(':userId', $userId);
//   $stmt->bindParam(':userPw',$userPw);

  $stmt->execute();
  $result = $stmt->fetchAll();

  //레코드셋에 row가 있는지 확인
  $i=0;
  $cntResult = 0;
  $pwdFromDB ="";
  foreach($result as $row){
  //여기서 필요한 처리를 진행...
  // $row['COUNT(MANAGER_ID)'];
  // print_r($row);
  // print_r($row['0']);
  $pwdFromDB = $row['MANAGER_PWD'];
  $i++;
  }


  if($i <= 0){

    echo "<script>alert('아이디 없음.');history.back();</script>";
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
  }


  if ( !password_verify($password, $pwdFromDB) ) {
       // throw new Exception('비밀번호가 일치하지 않습니다.');
        echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
       echo "<meta http-equiv='refresh' content='0;url=login.php'>";
       exit;
      //header("Location: /logout.php");
  }


  // if($cntResult <= 0 ) {
  //   echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
  //   exit;
  // }

  else{
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
