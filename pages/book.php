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
  <nav class="navbar navbar-light" style="background-color: maroon;">
    <div class="container" style="margin: 0px 80px 0px 50px;">
      <a class="navbar-brand" href="librarian.php"><img src="../assets/img/logotext1.png" alt="" width="100%" height="100px"></a>
      <h1 class=".navbar-brand text-warning" style="position: absolute; text-align:center; left: 0; right:0;">List of Books</h1>
      <div class="user" >
      <a href="../pages/login.php" target="_top" onclick="return confirm('Are you sure you want to logout?');logout()" style="right:50px; position: absolute;"><i class="fa fa-sign-out" aria-hidden="true" style="color:rgba(242, 206, 26, 0.886); font-size: 30px; curser: pointer;" title="Logout"></i></a>
      </div>
    </div>
  </nav>

  <div class="container" style="margin-left: 50px; ">
    <br><br>
  <h2><?php echo $adminData['name']; ?></h2>
  <h6><?php echo $adminData['email']; ?></h6>
  </div>

	<!--Add Book-->
	<section id="sections" class="py-4 mb-2">
		<div class="container">
			<div class="row text-center">
				<div class="col-md"></div>
        <div class="col-md-3">
					<a href="?add" class="btn btn-danger btn-block" id="add" data-bs-toggle="modal" data-bs-target="#addBook"><i class='bx bx-plus-medical'></i>Add a Book</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>

	</section>

	<!--Table-->
	<section id="post">
		<div class="container" style="padding:0px 50px 0px 50px; min-width:100%">
			<div class="row">
			<table id="tbl_book" class="table table-hover table-striped">
							<thead class="table-danger">
                <th>ID</th>
                <th>ISBN</th>
								<th>Title</th>
								<th>Author</th>
                <th>Year Published</th>
                <th>Is Active</th>
                <th>Action</th>
							</thead>
							 <tbody>

                 <?php

                 $query = mysqli_query($con, "SELECT * FROM tbl_book");

                 while( $row = mysqli_fetch_assoc($query) ){

                 $id = $row['BookID'];
                 $title = $row['BookTitle'];
                 $isbn = $row['BookISBN'];
                 $author = $row['BookAuthor'];
                 $year = $row['BookPublicationYear'];
                 $publisher = $row['BookPublisher'];
                 $copies = $row['BookCopies'];
                 $catid = $row['CategoryID'];
                 $isactive = $row['isActive'];
                 ?>

                 <tr>
                   <td> <?php echo $id;  ?> </td>
                   <td> <?php echo $isbn;  ?> </td>
                   <td> <?php echo $title;  ?> </td>
                   <td> <?php echo $author;  ?> </td>
                   <td> <?php echo $year;  ?> </td>
                   <td> <?php
                   if ($row['isActive'] == 'Yes')
                   {
                     echo "<span class='badge bg-success text-dark'>Yes</span>";
                   }
                   else{
                     echo "<span class='badge bg-danger text-dark'>No</span>";
                   }
                   ?> </td>
                   <td>

                     <a class="btn btn-primary btn-sm" data-bs-toggle="modal" id="viewbtn" data-bs-target="#view"
                                       data-id="<?php echo $id; ?>"
                                       data-title="<?php echo $title; ?>"
                                       data-isbn="<?php echo $isbn; ?>"
                                       data-author="<?php echo $author; ?>"
                                       data-year="<?php echo $year; ?>"
                                       data-publisher="<?php echo $publisher; ?>"
                                       data-copies="<?php echo $copies; ?>"
                                       data-catid="<?php echo $catid; ?>"
                                       data-isactive="<?php echo $isactive; ?>"
                                       ><i class="fas fa-eye"></i>
                      </a>

                      <a class="btn btn-success btn-sm" data-bs-toggle="modal" id="editbtn" data-bs-target="#edit"
                                        data-editid="<?php echo $id; ?>"
                                        data-edittitle="<?php echo $title; ?>"
                                        data-editisbn="<?php echo $isbn; ?>"
                                        data-editauthor="<?php echo $author; ?>"
                                        data-edityear="<?php echo $year; ?>"
                                        data-editpublisher="<?php echo $publisher; ?>"
                                        data-editcopies="<?php echo $copies; ?>"
                                        data-editcatid="<?php echo $catid; ?>"
                                        data-editisactive="<?php echo $isactive; ?>"
                                        ><i class="fas fa-edit"></i>
                      </a>
                      <a class="btn btn-danger btn-sm" href="../php/book-function.php?delete=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete the book?')";><i class='bx bx-trash'></i></a>
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


  <!-- The Modal (ADD) for book -->
  <div class="modal fade" id="addBook">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>Add a Book</h5>
					</div>
					<button type="button btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="../php/book-function.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
              <label class="form-control-label">ISBN:</label>
              <input type="number" id="randomNumberInput" size="60" class="form-control" name="_isbn" required autocomplete="off" readonly>
              <input type="button" value="Regenerate" onclick="generateRandomNumbers()" class="form-control"> <br>


              <label class="form-control-label">Title:</label>
							<input type="text" name="_title" class="form-control" required autocomplete="off"> <br>

              <label class="form-control-label">Author:</label>
              <input type="text" name="_author" class="form-control" required autocomplete="off"> <br>

              <label class="form-control-label">Year Published:</label>
							<select name="_yearpublished" class="form-control" required autocomplete="off">
								<option value=""></option>
								<option value="2023">2023</option>
								<option value="2022">2022</option>
								<option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2019">2009</option>
							</select>

              <br>

              <label class="form-control-label">Publisher:</label>
              <input type="text" name="_publisher" class="form-control" required autocomplete="off"> <br>

              <label class="form-control-label">Copies:</label>
              <input type="number" name="_copies" class="form-control" required autocomplete="off"> <br>

              <label class="form-control-label">CategoryID:</label>
              <select class="choices form-select" name="_categoryid" class="form-control" required autocomplete="off">
                <option value="">Choose..</option>
                <?php
                $sql = "SELECT * FROM tbl_bookcategory";
                $query = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                  $CategoryID = $row['CategoryID'] . " - " . $row['CategoryName']; ?>
                  <option value="<?php echo $row['CategoryID']. " - " . $row['CategoryName']; ?>">
                    <?php echo $CategoryID; ?>
                  </option>
                <?php } ?>
              </select>

              <br>

              <label class="form-control-label">Is it Active:</label>
              <input placeholder="Yes" type="text" name="_isActive" class="form-control" readonly style="background-color: #ccc;"> <br>


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

  <!-- The Modal (VIEW) for Book -->
<!-- View Modal -->
<div class="modal fade" id="view">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <form>
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Selected Book Details</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row mx-3">
            <div class="col-sm">
              <p>Book ID:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-ID"></b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Title:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-TITLE"></b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Book ISBN:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-ISBN">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Author:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-AUTHOR">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Year Published:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-YEAR">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Publisher:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-PUBLISHER">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Copies</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-COPIES">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Category ID</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-CATID">&nbsp;</b></p>
            </div>
            <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
              <p>Is Active:</p>
            </div>
            <div class="col-sm">
              <p style="background-color: #ccc; border-style: groove;"><b id="info-ISACTIVE">&nbsp;</b></p>
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



  <!-- The Modal (EDIT) for Book -->
  <div class="modal fade" id="edit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="../php/book-function.php" method="GET" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title fw-bold">Update Book</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
          <div class="row mx-3">
            <div class="col-sm">
             <p>Book ID:</p>
             </div>
            <div class="col-sm">
              <input type="text" id="idid" name="idid" value="" readonly style="background-color: #ccc;">
            </div>
          <hr>
          </div>
          <div class="row mx-3">
          <div class="col-sm">
           <p>Book ISBN:</p>
           </div>
          <div class="col-sm">
            <input type="number" id="isbnisbn" name="isbnisbn" value="" readonly style="background-color: #ccc;">
          </div>
        <hr>
        </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Title:</p>
          </div>
          <div class="col-sm">
          <input type="text" id="titletitle" name="titletitle" value="">
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Author:</p>
          </div>
          <div class="col-sm">
          <input type="text" id="authorauthor" name="authorauthor" value="">
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Year Published:</p>
          </div>
          <div class="col-sm">
          <select id="yearyear" name="yearyear" style="width: 188px;">
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2019">2009</option>
          </select>
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Publisher:</p>
          </div>
          <div class="col-sm">
          <input type="text" id="publisherpublisher" name="publisherpublisher" value="">
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Copies:</p>
          </div>
          <div class="col-sm">
          <input type="number" id="copiescopies" name="copiescopies" value="">
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Category ID:</p>
          </div>
          <div class="col-sm">
          <select id="catidcatid" name="catidcatid" style="width: 188px;">
            <option value="">Choose..</option>
            <?php
            $sql = "SELECT * FROM tbl_bookcategory";
            $query = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($query)) {
              $CategoryID = $row['CategoryID'] . " - " . $row['CategoryName']; ?>
              <option value="<?php echo $row['CategoryID']. " - " . $row['CategoryName']; ?>">
                <?php echo $CategoryID; ?>
              </option>
            <?php } ?>
          </select>
          </div>
          <hr>
          </div>
          <div class="row mx-3">
            <div class="col-sm">
            <p>Is Active:</p>
          </div>
          <div class="col-sm">
          <select id="isactiveisactive" name="isactiveisactive" style="width: 188px;">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
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

  <script>
    // Function to generate and display the random numbers
    function generateRandomNumbers(min = 0, max = 10000000000000) {
      // find diff
      let difference = max - min;

      // generate random number
      let rand = Math.random();

      // multiply with difference
      rand = Math.floor(rand * difference);

      // add with min value
      rand = rand + min;

      // Set the value of the input field with the generated number
      var inputElement = document.getElementById('randomNumberInput');
      inputElement.value = rand;
    }

    // Generate random numbers on page load
    generateRandomNumbers();
  </script>

</body>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(function(){

  $("#tbl_book").DataTable({
    "responsive":true,
    "autoWidth":false
  });
});


$(document).on('click', '#viewbtn', function () {
  var id = $(this).data('id');
  var title = $(this).data('title');
  var isbn = $(this).data('isbn');
  var author = $(this).data('author');
  var year = $(this).data('year');
  var publisher = $(this).data('publisher');
  var copies = $(this).data('copies');
  var catid = $(this).data('catid');
  var isactive = $(this).data('isactive');

  $("#info-ID").text(id);
  $("#info-TITLE").text(title);
  $("#info-ISBN").text(isbn);
  $("#info-AUTHOR").text(author);
  $("#info-YEAR").text(year);
  $("#info-PUBLISHER").text(publisher);
  $("#info-COPIES").text(copies);
  $("#info-CATID").text(catid);
  $("#info-ISACTIVE").text(isactive);
});

$(document).on('click', '#editbtn', function () {
  var mappings = {
    'editid': 'idid',
    'edittitle': 'titletitle',
    'editisbn': 'isbnisbn',
    'editauthor': 'authorauthor',
    'edityear': 'yearyear',
    'editpublisher': 'publisherpublisher',
    'editcopies': 'copiescopies',
    'editcatid': 'catidcatid',
    'editisactive': 'isactiveisactive',
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
