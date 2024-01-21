<?php
include '../host/dbconnection.php';

if (isset($_POST['save'])) {
    try{

        $CategoryName = $_POST['_categoryname'];

        insertData($CategoryName, $con);
    }
    catch(Exception $e){
        echo "<script>alert('Cannot add category from records.'); window.location.href = '../pages/bookcategory.php';</script>";
    }
}



function insertData($CategoryName, $con)
{
    $existingCategorySql = "SELECT CategoryID FROM tbl_bookcategory WHERE CategoryName = '$CategoryName'";
    $existingCategoryQuery = mysqli_query($con, $existingCategorySql);

    if (mysqli_num_rows($existingCategoryQuery) > 0) {
        // Category already exists
        echo "<script>alert('Category already exists.'); window.location.href = '../pages/bookcategory.php';</script>";
        exit;
    }

    $sql = "INSERT INTO tbl_bookcategory (CategoryName) VALUES ('$CategoryName')";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/bookcategory.php");
    exit;
}
if (isset($_GET['delete'])) {
    try{
        $CategoryID = $_GET['delete'];

    require_once("../host/dbconnection.php");

    $sql = "DELETE FROM tbl_bookcategory WHERE CategoryID='$CategoryID'";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/bookcategory.php");
    }
    catch(Exception $e){
        echo "<script>alert('Record is used in another table.'); window.location.href = './pages/bookcategory.php';</script>";
    }

}



function editData($CatsID, $CName, $isisactive, $con)
{

    require_once("../host/dbconnection.php");

    $sql = "UPDATE tbl_bookcategory SET CategoryName='$CName', IsActive='$isisactive'
    WHERE CategoryID='$CatsID'";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/bookcategory.php");

}

if (isset($_GET['editbtn'])) {
    $CatsID = $_GET['catids'];
    $CName = $_GET['catfull'];
    $isisactive = $_GET['isisactive'];

    editData($CatsID, $CName, $isisactive, $con);
}
?>
