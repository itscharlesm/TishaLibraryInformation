<?php
require '../host/dbconnection.php';
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

</head>
<body>
  <?php
  $sql = "SELECT * FROM tbl_librarian";
  $query = mysqli_query($con, $sql);
  $adminData = mysqli_fetch_assoc($query);

  ?>
  <nav class="navbar navbar-light" style="background-color: green;">
    <div class="container" style="margin: 0px 80px 0px 50px;">
      <a class="navbar-brand" href="bookcategory.php"><img src="../assets/img/logotext1.png" alt="" width="100%" height="100px"></a>
      <h1 class=".navbar-brand text-white" style="position: absolute; text-align:center; left: 0; right:0;">List of Categories</h1>
      <div class="user" >
      <a href="../pages/login.php" target="_top" onclick="return confirm('Are you sure you want to logout?');logout()" style="right:50px; position: absolute;"><i class="fa fa-sign-out" aria-hidden="true" style="color:rgb(255, 255, 255); font-size: 30px; curser: pointer;" title="Logout"></i></a>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-left: 50px; ">
    <br><br>
  <h2><?php echo $adminData['name']; ?></h2>
  <h6><?php echo $adminData['email']; ?></h6>
  </div>

	<!--Add Book Category-->
	<section id="sections" class="py-4 mb-2">
		<div class="container">
			<div class="row text-center">
				<div class="col-md"></div>
        <div class="col-md-3">
					<a href="?add" class="btn btn-success btn-block" id="add" data-bs-toggle="modal" data-bs-target="#addCategory"><i class='bx bx-plus-medical'></i>Add a Category</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>

	</section>

	<!--Table-->
	<section id="post">
		<div class="container" style="padding:0px 50px 0px 50px; min-width:100%">
			<div class="row">
			<table id="tblcategory" class="table table-hover table-striped">
							<thead class="table-success">
								<th>Category ID</th>
								<th>Category Name</th>
								<th>Is Active</th>
                <th>Action</th>
							</thead>
							 <tbody>

                 <?php

                 $query = mysqli_query($con, "SELECT * FROM tbl_bookcategory");

                 while( $row = mysqli_fetch_assoc($query) ){

                 $categoryID = $row['CategoryID'];
                 $cname = $row['CategoryName'];
                 $isactive = $row['IsActive'];
                 ?>

                 <tr>
                   <td> <?php echo $categoryID;  ?> </td>
                   <td> <?php echo $cname;  ?> </td>
                   <td> <?php
                   if ($row['IsActive'] == 'Yes')
                   {
                     echo "<span class='badge bg-success text-dark'>Yes</span>";
                   }
                   else{
                     echo "<span class='badge bg-danger text-dark'>No</span>";
                   }
                   ?> </td>

                   <td>
                     <a class="btn btn-primary btn-sm" data-bs-toggle="modal" id="viewbtn" data-bs-target="#view"
                                       data-categoryID="<?php echo $categoryID; ?>"
                                       data-cname="<?php echo $cname; ?>"
                                       data-isactive="<?php echo $isactive; ?>"
                                       ><i class="fas fa-eye"></i>
                      </a>

                      <a class="btn btn-success btn-sm" data-bs-toggle="modal" id="editbtn" data-bs-target="#edit"
                                        data-category="<?php echo $categoryID; ?>"
                                        data-catname="<?php echo $cname; ?>"
                                        data-isitactive="<?php echo $isactive; ?>"
                                        ><i class="fas fa-edit"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" href="../php/category-function.php?delete=<?php echo $categoryID; ?>" onclick="return confirm('Are you sure you want this category?')";><i class='bx bx-trash'></i></a>
                   </td>
                 </tr>
                 <?php

                 }

                 ?>
							 </tbody>
						</table>
			</div>
		</div>
	</section>


  <!-- The Modal (ADD) for Category -->
  <div class="modal fade" id="addCategory">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Create Category</h5>
					</div>
					<button type="button btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="../php/category-function.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-control-label">Category Name:</label>
							<input type="text" name="_categoryname" class="form-control" required autocomplete="off"> <br>

              <label class="form-control-label">Is it Active:</label>
              <input placeholder="Yes" type="text" name="_istrue" class="form-control" required autocomplete="off" readonly style="background-color: #ccc;"> <br>

						</div>
						<br>

				</div>
				<div class="modal-footer">
					<input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-success" name="save" value="Save">
				</div>
			</form>
			</div>
		</div>
	</div>

  <!-- The Modal (VIEW) for Category -->
<!-- View Modal -->
<div class="modal fade" id="view">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <form>
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Selected Category Details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row mx-3">
            <div class="col-sm">
              <p>Category ID:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-categoryid"></b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Category Name:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-name"></b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Is Active:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-active">&nbsp;</b></p>
            </div>
            <hr>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-warning" data-bs-dismiss="modal">
            CLOSE <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>



  <!-- The Modal (EDIT) for Book Category -->
  <div class="modal fade" id="edit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="../php/category-function.php" method="GET" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title fw-bold">Update Category</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row mx-3">
              <div class="col-sm">
               <p>Category ID:</p>
               </div>
              <div class="col-sm">
                <input type="text" id="catids" name="catids" value="" readonly style="background-color: #ccc;">
              </div>
            <hr>
            </div>
            <div class="row mx-3">
            <div class="col-sm">
             <p>Name:</p>
             </div>
            <div class="col-sm">
              <input type="text" id="catfull" name="catfull" value="">
            </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Is it Active:</p>
          </div>
          <div class="col-sm">
          <select id="isisactive" name="isisactive" style="width: 188px;">
            <option>Yes</option>
            <option>No</option>
          </select>
          </div>
          <hr>
          </div>
          </div>
          <div class="modal-footer">
          <input type="button" class="btn btn-danger" value="Close" data-bs-dismiss="modal">
          <input type="hidden" name="status" value="0">
					<input type="submit" class="btn btn-success" name="editbtn" value="Save" data-bs-dismiss="modal">
				  </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(function(){

  $("#tblcategory").DataTable({
    "responsive":true,
    "autoWidth":false
  });
});


$(document).on('click', '#viewbtn', function () {
  var categoryID = $(this).data('categoryid');
  var cname = $(this).data('cname');
  var isactive = $(this).data('isactive');

  $("#info-categoryid").text(categoryID);
  $("#info-name").text(cname);
  $("#info-active").text(isactive);
});

$(document).on('click', '#editbtn', function () {
  var mappings = {
    'category': 'catids',
    'catname': 'catfull',
    'isitactive': 'isisactive',
  };

  for (var key in mappings) {
    if (mappings.hasOwnProperty(key)) {
      var inputValue = $(this).data(key);
      var inputId = mappings[key];
      var inputElement = document.getElementById(inputId);

      if (inputElement && inputValue !== undefined) {
        inputElement.value = inputValue;
      }
    }
  }
});


</script>
</html>

