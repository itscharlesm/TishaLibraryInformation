<?php
session_start();
include('../host/dbconnection.php');

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = mysqli_query($con, "SELECT LibrarianID FROM tbl_librarian WHERE email='$email' AND password='$password'");

    $query2 = mysqli_query($con, "SELECT GuestID FROM tbl_guest WHERE email='$email' AND password='$password'");

    // Check for query execution errors
    if (!$query) {
        die("Query failed: " . mysqli_error($con));
    }

    if (!$query2) {
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($query);
    $row2 = mysqli_fetch_assoc($query2);

    if ($row) {
        // Librarian login
        $_SESSION['LibrarianID'] = $row['LibrarianID'];
        $_SESSION["login_time_stamp"] = time();
        header('location:../index.php#dashboard');
    } elseif ($row2) {
        // Guest login
        $_SESSION['GuestID'] = $row2['GuestID'];
        $_SESSION["login_time_stamp"] = time();
        header('location:../guest.php');
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = '../pages/login.php';</script>";
        exit();
    }
}
?>