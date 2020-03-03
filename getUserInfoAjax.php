<?php
require 'createConn.php';
header("Content-Type: application/json");

try {
  $data = json_decode($_POST['data']);

  //  $data->userLoginId;
  $name = $data->{'year'};
  $name = '%'.$name.'%';
    $db = new DB();

    // $age = 18;

    $sql = 'SELECT
          USER_ID as userId,
          USER_NM as userNm,
          PHONE_NO as phoneNo,
          USER_EMAIL as userEmail
          FROM tn_user where USER_LOGIN_ID LIKE :name limit 100';
    $stmt =$db->prepare($sql);
    $stmt->bindParam(':name',$name);
    $stmt->execute();
    // $result =$stmt->fetchAll(PDO::FETCH_ASSOC);

    $myArray = array();

    while($row = $stmt->fetch()) {
            $myArray[] = $row;
    }
    echo json_encode( $myArray);

    // echo 'Success';
}catch(Exception$e) {
    echo $name;
}
$db = null;


//header("content-type:application/json; charset=utf-8"); //charset 지정
// include ('createConn.php');
// $method = $_SERVER['REQUEST_METHOD'];
//  $dbHost = "220.76.91.51:13306";      // 호스트 주소(localhost, 120.0.0.1)
//   $dbName = "dycis_mobile";      // 데이타 베이스(DataBase) 이름
//   $dbUser = "root";          // DB 아이디
//   $dbPass = "gkrtns";        // DB 패스워드
//
//   // PDO + MariaDB 연결하기
//   $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);



//  $stx = $_POST['userLoginId'];
  // $data = json_decode($_POST['data']);
  //
  // //  $data->userLoginId;
  // $name = $data->{'userLoginId'};
  // $name = '%'.$name.'%';
  // //echo $name
  //
  // $stmt = $pdo -> prepare('SELECT USER_ID, USER_NM FROM tn_user where USER_LOGIN_ID LIKE :name limit 100');
  //
  // $stmt -> bindParam(":name", $name);	// 변수에 바인딩 하기 위해 bindValue을 사용
  // $stmt -> execute();				// WHERE name = "Kei"으로 실행된다.
  //   //  $row = $stmt -> fetch();			// 객체가 실행한 쿼리의 결과값 가져오기
  // // $result = $statement -> fetch(PDO::FETCH_ASSOC);
  // $myArray = array();
  //
  // while($row = $stmt -> fetch()) {
  //         $myArray[] = $row;
  // }
  // echo json_encode( $myArray);

  // $name = $_POST['sfl'];

  // $email = $_POST['stx'];
  //

  // var data = [
  //   {
  //     name: 'Beautiful Lies',
  //     artist: 'Birdy',
  //     release: '2016.03.26',
  //     genre: 'Pop'
  //   }
  // ]
  // $conn = new mysqli("220.76.91.51", "root", "gkrtns", "dycis_mobile","13306");
  //
  //  // $insert_query = "SELECT USER_ID, USER_NM FROM tn_user limit 10";
  //
  //
  //  // $result = mysql_query($conn, $insert_query);
  //
  //  $myArray = array();
  //  if ($result = $conn->query("SELECT USER_ID, USER_NM FROM tn_user limit 100")) {
  //
  //      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
  //              $myArray[] = $row;
  //      }
  //      echo json_encode($myArray);
  //  }


//  $statement = $pdo -> prepare("SELECT USER_ID, USER_NM FROM tn_user where USER_LOGIN_ID LIKE '%:name%' limit 100");
  // $statement = bindValue(":name", $name);




// for($i=0; $row = mysql_fetch_array($result); $i++) {
//     //검색 완료한 데이터를 배열로 집어넣기!
//     $list[] = array("USER_ID"=> $row[USER_ID], "USER_NM"=> $row[USER_NM]);
// }
//  echo json_encode($list);

// $data = json_decode($_POST['data']);


//echo(json_encode(array( "sfl" => $data->sfl, "stx" => $data->stx)));
 // echo(json_encode(array( "name" => $data->sfl, "stx" => $data->stx)));

// $_testJson = "{"test-key":"test-value"}";
// $data = [ 'name' => $name, 'age' => $emil ];


//echo json_encode($data);



//POST로 불러온 값들을 변수로 변경!
// $tot=$_POST['tot'];
// $sfl = $_POST['sfl'];
// $stx = $_POST['stx'];







// $insert_query = "SELECT USER_ID, USER_NM FROM tn_user limit 10";
// $jb_result = mysqli_query($conn, $insert_query);;
//
// while( $jb_row = mysqli_fetch_array( $jb_result ) ) {
//   echo '<p>' . $jb_row[ 'USER_ID' ].'&nbsp;' . $jb_row[ 'USER_NM' ] .  '</p>';
// }
?>
