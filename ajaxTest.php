<?php
//header("content-type:application/json; charset=utf-8"); //charset 지정
header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
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
$conn = new mysqli("220.76.91.51", "root", "gkrtns", "dycis_mobile","13306");

 // $insert_query = "SELECT USER_ID, USER_NM FROM tn_user limit 10";


 // $result = mysql_query($conn, $insert_query);

 $myArray = array();
 if ($result = $conn->query("SELECT USER_ID, USER_NM FROM tn_user limit 100")) {

     while($row = $result->fetch_array(MYSQLI_ASSOC)) {
             $myArray[] = $row;
     }
     echo json_encode($myArray);
 }




// for($i=0; $row = mysql_fetch_array($result); $i++) {
//     //검색 완료한 데이터를 배열로 집어넣기!
//     $list[] = array("USER_ID"=> $row[USER_ID], "USER_NM"=> $row[USER_NM]);
// }
//  echo json_encode($list);

// $data = json_decode($_POST['data']);


// echo(json_encode(array( "sfl" => $data->sfl, "stx" => $data->stx)));
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
