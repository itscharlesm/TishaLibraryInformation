<?php
include '../host/dbconnection.php';

if (isset($_POST['save'])) {
    try{

        $name = $_POST['_name'];
        $email = $_POST['_email'];
        $password = $_POST['_password'];

        insertData($name, $email, $password, $con);
    }
    catch(Exception $e){
        echo "<script>alert('Cannot add category from records.'); window.location.href = '../pages/bookcategory.php';</script>";
    }
}



function insertData($name, $email, $password, $con)
{
    $existingCategorySql = "SELECT GuestID FROM tbl_guest WHERE name = '$name'";
    $existingCategoryQuery = mysqli_query($con, $existingCategorySql);

    if (mysqli_num_rows($existingCategoryQuery) > 0) {
        // Category already exists
        echo "<script>alert('Guest name already exists.'); window.location.href = '../pages/bookcategory.php';</script>";
        exit;
    }

    $sql = "INSERT INTO tbl_guest (name, email, password) VALUES ('$name', '$email', '$password')";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/login.php");
    exit;
}





?>
