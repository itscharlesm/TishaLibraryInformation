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
        echo "<script>alert('Cannot add from records.'); window.location.href = './pages/librarian.php';</script>";
    }
}

function insertData($name, $email, $password, $con)
{
    $existingNameSql = "SELECT LibrarianID FROM tbl_librarian WHERE name = '$name'";
    $existingNameQuery = mysqli_query($con, $existingNameSql);

    if (mysqli_num_rows($existingNameQuery) > 0) {
        // Name already exists
        echo "<script>alert('Librarian with the same name already exists.'); window.location.href = '../pages/librarian.php';</script>";
        exit;
    }

    $existingEmailSql = "SELECT LibrarianID FROM tbl_librarian WHERE email = '$email'";
    $existingEmailQuery = mysqli_query($con, $existingEmailSql);

    if (mysqli_num_rows($existingEmailQuery) > 0) {
        // Email already exists
        echo "<script>alert('Librarian with the same email already exists.'); window.location.href = '../pages/librarian.php';</script>";
        exit;
    }

    $sql = "INSERT INTO tbl_librarian (name, email, password)
            VALUES ('$name', '$email', '$password')";
    $query1 = mysqli_query($con, $sql);

    header("location: ../pages/librarian.php");
    exit;
}
if (isset($_GET['delete'])) {
    try{
        $LibrarianID = $_GET['delete'];

    require_once("../host/dbconnection.php");

    $sql = "DELETE FROM tbl_librarian WHERE LibrarianID='$LibrarianID'";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/librarian.php");
    }
    catch(Exception $e){
        echo "<script>alert('Record is used in another table.'); window.location.href = './pages/librarian.php';</script>";
    }

}



function editData($LibsID, $FName, $emadd, $con)
{

    require_once("../host/dbconnection.php");

    $sql = "UPDATE tbl_librarian SET name='$FName', email='$emadd'
    WHERE LibrarianID='$LibsID'";
    $query1 = mysqli_query($con, $sql);

    header("location: ../pages/librarian.php");

}

if (isset($_GET['editbtn'])) {
    $LibsID = $_GET['libId'];
    $FName = $_GET['fullname'];
    $emadd = $_GET['eaddress'];

    editData($LibsID, $FName, $emadd, $con);
}
?>
