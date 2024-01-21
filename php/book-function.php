<?php
include '../host/dbconnection.php';

if (isset($_POST['save'])) {
    try{

        $BookISBN = $_POST['_isbn'];
        $BookTitle = $_POST['_title'];
        $BookAuthor = $_POST['_author'];
        $BookPublicationYear = $_POST['_yearpublished'];
        $BookPublisher = $_POST['_publisher'];
        $BookCopies = $_POST['_copies'];
        $CategoryID = $_POST['_categoryid'];

        insertData($BookISBN, $BookTitle, $BookAuthor, $BookPublicationYear, $BookPublisher, $BookCopies, $CategoryID, $con);
    }
    catch(Exception $e){
        echo "<script>alert('Cannot add from records.'); window.location.href = './pages/book.php';</script>";
    }
}

function insertData($BookISBN, $BookTitle, $BookAuthor, $BookPublicationYear, $BookPublisher, $BookCopies, $CategoryID, $con)
{
    $existingTitleSql = "SELECT BookID FROM tbl_book WHERE BookTitle = '$BookTitle'";
    $existingTitleQuery = mysqli_query($con, $existingTitleSql);

    if (mysqli_num_rows($existingTitleQuery) > 0) {
        // Book title already exists
        echo "<script>alert('Book with the same title already exists.'); window.location.href = '../pages/book.php';</script>";
        exit;
    }

    $existingISBNSql = "SELECT BookID FROM tbl_book WHERE BookISBN = '$BookISBN'";
    $existingISBNQuery = mysqli_query($con, $existingISBNSql);

    if (mysqli_num_rows($existingISBNQuery) > 0) {
        // ISBN already exists
        echo "<script>alert('Book with the same ISBN already exists.'); window.location.href = '../pages/book.php';</script>";
        exit;
    }

    $sql = "INSERT INTO tbl_book (BookISBN, BookTitle, BookAuthor, BookPublicationYear, BookPublisher, BookCopies, CategoryID)
            VALUES ('$BookISBN', '$BookTitle', '$BookAuthor', '$BookPublicationYear', '$BookPublisher', '$BookCopies', '$CategoryID')";
    $query1 = mysqli_query($con, $sql);

    header("location: ../pages/book.php");
    exit;
}
if (isset($_GET['delete'])) {
    try{
        $BookID = $_GET['delete'];

    require_once("../host/dbconnection.php");

    $sql = "DELETE FROM tbl_book WHERE BookID='$BookID'";
    $query = mysqli_query($con, $sql);

    header("location: ../pages/book.php");
    }
    catch(Exception $e){
        echo "<script>alert('Record is used in another table.'); window.location.href = './pages/book.php';</script>";
    }

}



function editData($booksid, $booksisbn, $bookstitle, $booksauthor, $booksyear, $bookspublisher, $bookscopies, $bookscatid, $booksisactive, $con)
{

    require_once("../host/dbconnection.php");

    $sql = "UPDATE tbl_book SET BookTitle='$bookstitle', BookISBN='$booksisbn', BookAuthor='$booksauthor', BookPublicationYear='$booksyear',
     BookPublisher='$bookspublisher', BookCopies='$bookscopies', CategoryID='$bookscatid', isActive='$booksisactive'
    WHERE BookID='$booksid'";
    $query1 = mysqli_query($con, $sql);

    header("location: ../pages/book.php");

}

if (isset($_GET['editbtn'])) {
    $booksid = $_GET['idid'];
    $booksisbn = $_GET['isbnisbn'];
    $bookstitle = $_GET['titletitle'];
    $booksauthor = $_GET['authorauthor'];
    $booksyear = $_GET['yearyear'];
    $bookspublisher = $_GET['publisherpublisher'];
    $bookscopies = $_GET['copiescopies'];
    $bookscatid = $_GET['catidcatid'];
    $booksisactive = $_GET['isactiveisactive'];

    editData($booksid, $booksisbn, $bookstitle, $booksauthor, $booksyear, $bookspublisher, $bookscopies, $bookscatid, $booksisactive, $con);
}
?>
