<?php
// echo $result = "당신은 '{$userLoginId}'이라고 썼습니다.";
require 'createConn.php';
header("Content-Type: application/json");

try {

  //  $data->userLoginId;
  $db = new DB();

  $userLoginId  = $_POST['userLoginId'];
  $phoneNo      = $_POST['phoneNo'];
  $userNm       = $_POST['userNm'];
  $userEmail    = $_POST['userEmail'];
  $userBirthday = $_POST['userBirthday'];


  // $age = 18;

  $sql = 'INSERT INTO dycis_mobile.tn_user
            (
             USER_LOGIN_ID,
             USER_PW,
             PHONE_NO,
             USER_NM,
             USER_EMAIL,
             USER_BIRTHDAY
            )
VALUES (
    :userLoginId,
    "test",
    :phoneNo,
    :userNm,
    :userEmail,
    :userBirthday
        )';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':userLoginId',$userLoginId);
  $stmt->bindParam(':phoneNo',$phoneNo);
  $stmt->bindParam(':userNm',$userNm);
  $stmt->bindParam(':userEmail',$userEmail);
  $stmt->bindParam(':userBirthday',$userBirthday);

  $result = $stmt->execute();

  // $stmt->fetch();
  // echo $result;
  // echo "<script> alert('Stored successfully'); </script>";
  //   exit;
    // echo 'Success';
}catch(Exception$e) {
    echo $e;
}
$db = null;

header('Location: /monthlyOutputList.php');
// echo "<script>alert('등록되었습니다.');</script>";
?>
<!DOCTYPE html>
<meta charset="utf-8" />
<meta http-equiv='refresh' content='0;url=/monthlyOutputList.php'>
