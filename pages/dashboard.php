<?php
require '../host/dbconnection.php';

$numBookQ = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(BookID) FROM `tbl_book`"));
$numBook = $numBookQ[0];
$numCategoryQ = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(CategoryID) FROM `tbl_bookcategory`"));
$numCategory = $numCategoryQ[0];
$numLibrarianQ = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(LibrarianID) FROM `tbl_librarian`"));
$numLibrarian = $numLibrarianQ[0];
$numActiveQ = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) FROM tbl_book WHERE isActive = 'YES'"));
$numActive = $numActiveQ[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> ADMIN DASHBOARD </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="imgs/logo1.png"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="../css/styles.css" type="text/css">
      <link rel="stylesheet" href="../css/dashboard.css" type="text/css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
      <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/index.js"></script>
      <script src="../assets/js/dashboard.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
      <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</head>
<body>
  <?php
  $sql = "SELECT * FROM tbl_librarian";
  $query = mysqli_query($con, $sql);
  $adminData = mysqli_fetch_assoc($query);

  ?>
  <nav class="navbar navbar-light" style="background-color: maroon;">
    <div class="container" style="margin: 0px 80px 0px 50px;">
      <a class="navbar-brand" href="consultation.php"><img src="../assets/img/logotext1.png" alt="" width="100%" height="100px"></a>
      <h1 class=".navbar-brand text-warning" style="position: absolute; text-align:center; left: 0; right:0;">Dashboard</h1>
      <div class="user" >
      <a href="../pages/login.php" target="_top" onclick="return confirm('Are you sure you want to logout?');logout()" style="right:50px; position: absolute;"><i class="fa fa-sign-out" aria-hidden="true" style="color:rgba(242, 206, 26, 0.886); font-size: 30px; curser: pointer;" title="Logout"></i></a>
      </div>
    </div>
  </nav>

  <div class="content-wrapper">
    <br>
      <div class="container-fluid">
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-book"></i>
                </div>
                <div class="mr-5"><?php echo $numBook ?> - Books</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="book.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><?php echo $numCategory ?> - Categories</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="bookcategory.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?php echo $numActive ?> - Active Books</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5"><?php echo $numLibrarian ?> - Librarians</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="librarian.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div>
    <div class="container" style="padding: 0px 50px 0px 50px; width: 80vw;">
        <div class="row">
            <div class="modal-header bg-primary text-white">
                <div class="modal-title">
                    <h5>Recent Books</h5>
                </div>
            </div>
            <table id="tbl_book" class="table table-hover table-striped">
                <thead class="table-light">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Posted</th>
                    <th>&nbsp;&nbsp;</th>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM tbl_book");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $bookTitle = $row['BookTitle'];
                        $bookAuthor = $row['BookAuthor'];
                        $bookDate = $row['Date'];
                        ?>
                        <tr>
                            <td><?php echo $bookTitle; ?></td>
                            <td><?php echo $bookAuthor; ?></td>
                            <td><?php echo $bookDate; ?></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
