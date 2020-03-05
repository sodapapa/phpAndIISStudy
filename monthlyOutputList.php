<!DOCTYPE html>
<html lang="en">

<?php  include ('head.html')?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php  include ('menu.html')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include ('topbar.php')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h3 mb-0 text-gray-800"></h1>
          <!-- Topbar Search -->
          <form name="searchForm" id="searchForm" class="col-xl-6">
            <div class="input-group">
              <select name="year" id="yearpicker" class="form-control bg-light border-2 small">
                <option value="11" selected="selected">11</option>
                <option value="test">test</option>
                <option value="key">key</option>
                <?php
                  require 'createConn.php';
                  $cdGrp = 'ITEM_MENU_TYPE';
                  $db = new DB();
                  $sql = 'SELECT * FROM tm_cd WHERE CD_GRP = :cdGrp and FG_LANG="ko"';
                  $stmt =$db->prepare($sql);
                  $stmt->bindParam(':cdGrp' ,$cdGrp);
                  $stmt->execute();
                  // $result =$stmt->fetchAll(PDO::FETCH_ASSOC);

                  $myArray = array();

                  while($row = $stmt->fetch()) {
                          echo '<option value="'.$row['CD_NO'].'">'.$row['CD_NO'].'</option>';
                  }
                  // echo json_encode( $myArray);
                ?>
              </select>
              <select name="month" id="monthPicker" class="form-control bg-light border-2 small">
                <option value="바나나">바나나</option>
                <option value="사과">사과</option>
                <option value="파인애플" selected="selected">파인애플</option>
              </select>

              <input type="select" class="form-control bg-light border-2 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" id="searchBtn" onclick="javascript:getMonthlyDataList();">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#outputFormModal">
              <i class="fas fa-download fa-sm text-white-50"></i> insert</a>
          </div>
          <!-- Page Heading -->
          <!-- Content Row -->
            <div id="grid"></div>
          <!-- Content Row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php  include ('outputForm.html')?>
  <script type="text/javascript" src="js/custom/monthlyOutput.js"></script>


  </body>

  </html>
