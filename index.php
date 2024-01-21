<?php
session_start();
include './php/timeout.php';
if(!(isset($_SESSION["LibrarianID"]))){
    header('Location: ./pages/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo1.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/card.css">
    <script src="./assets/js/index.js"></script>
    <title>Tisha's Book Club Management</title>
</head>

<body onload="changeIframe('./pages/dashboard.php')">
    <nav class="sidebar">
        <div class="top">
            <div class="logo">
                <img src="./assets/img/logo1.png" alt="umlogo" width="40px" height="40px">
                <span style="font-size:15px; color: black;">Tisha's Bookclub<span>
            </div>
            <i class="bx bx-menu" id="btn" style="color: black;"></i>
        </div>

        <ul>

            <li>
                <a href="#dashboard" onclick="changeIframe('./pages/dashboard.php')">
                <i class='bx bx-clipboard' style="color: black;"></i>
                    <span class="nav-item" style="color: black;">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#book" onclick="changeIframe('./pages/book.php')">
                <i class="fa fa-user" aria-hidden="true" style="color: black;"></i>
                    <span class="nav-item" style="color: black;">List of Books</span>
                </a>
                <span class="tooltip">Books</span>
            </li>
            <li>
                <a href="#bookcategory" onclick="changeIframe('./pages/bookcategory.php')">
                    <i class='bx bxs-receipt' style="color: black;"></i>
                    <span class="nav-item" style="color: black;">Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href="#librarian" onclick="changeIframe('./pages/librarian.php')">
                    <i class='bx bxs-face'style="color: black;"></i>
                    <span class="nav-item" style="color: black;">Librarians</span>
                </a>
                <span class="tooltip">Librarians</span>
            </li>
            <li>
                <a href="./pages/login.php" onclick="return confirm('Are you sure you want to logout?'); logout();">
                    <i class="bx bx-log-out" style="color: black;"></i>
                    <span class="nav-item" style="color: black;">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <div class="form-check form-switch fs-6">
                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                <label class="form-check-label"></label>
            </div>
        </ul>
    </nav>

    <div class="main" style="padding:0; margin:0;">
    <div class="loader hidden" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 66" height="500px" width="500px" class="spinner">
            <circle stroke="url(#gradient)" r="20" cy="33" cx="33" stroke-width="1" fill="transparent" class="path"></circle>
            <linearGradient id="gradient">
                <stop stop-opacity="1" stop-color="#fe0000" offset="0%"></stop>
                <stop stop-opacity="0" stop-color="#af3dff" offset="100%"></stop>
            </linearGradient>
        </svg>
    </div>
        <iframe src="" frameborder="0" id="content" class="hidden">
        </iframe>
    </div>
</body>
<script>
    let btn = document.querySelector('#btn');
    let sidebar = document.querySelector('.sidebar');

    sidebar.classList.toggle('active');
    btn.onclick = function () {
        sidebar.classList.toggle('active');
    };

</script>
</html>
