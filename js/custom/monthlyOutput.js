const Grid = tui.Grid;
const columnData =  [
  {
    header: '아이디',
    name: 'userId'
  },
  {
    header: '이름',
    name: 'userNm'
  },
  {
    header: 'Phone',
    name: 'phoneNo'
  },
  {
    header: 'E-mail',
    name: 'userEmail'
  },
  {
    header: 'Release3',
    name: 'release3'
  },
  {
    header: 'Release4',
    name: 'release4'
  },
  {
    header: 'Genre1',
    name: 'genre1'
  },
  {
    header: 'Genre2',
    name: 'genre2'
  },
  {
    header: 'Genre3',
    name: 'genre3'
  },
  {
    header: 'Genre4',
    name: 'genre4'
  }
]


const instance = new Grid({
  el: document.getElementById('grid'), // Container element
columns: columnData
});

$(function() {
  getMonthlyDataList();

  for (i = new Date().getFullYear(); i > 2016; i--)
  {
      $('#yearpicker').append($('<option />').val(i).html(i));
  }

  for (i = 1; i <= 12; i++)
  {
      $('#monthPicker').append($('<option />').val(i).html(i));
  }

});



function getMonthlyDataList(){
  // $( "#searchBtn" ).click(function() {
    var year = $('#yearpicker').val();
    var month = $('#monthPicker').val();
    var query = $('#query').val();
    var data = JSON.stringify({year:year,month:month,query:query});
    var sendData =  {"data" : data}
    console.log(sendData);

      $.ajax({ //ajax start!
        type: "POST", //전송방식 POST와 GET 중에 하나
        url: "./getUserInfoAjax.php", //ajax를 실행할 파일 경로
        data: sendData, //전송방식이 POST일 경우에 전송할 데이터들을 나열해준다
        dataType: "json",
        cache: false,
        success: function(data){ //전송성공!
          console.log(data); //콘솔창에 데이터 찍어보기(배열 데이터가 출력됨)
          instance.resetData(data);
          var htmls = "";
      },
      error : function( jqxhr , status , error ){
        console.log( status , error);
        console.log( jqxhr.responseText  );
      }
    });
//  });
}
