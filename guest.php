<?php
session_start();
include './php/timeout.php';
if(!(isset($_SESSION["GuestID"]))){
    header('Location: ./pages/login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : BlackPolish
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20121026

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Welcome Guest</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link href="assets/css/guest.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="guest.php">Library</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#">Homepage</a></li>
					<li><a href="#">Services</a></li>
					<li><a href="#">Portfolio</a></li>
					<li><a href="#">About</a></li>
					<li><a href="pages/login.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div id="banner">
			<div class="content">
				<div><img src="assets/img/bg.jpg" width="1000" height="400" alt="" /></div>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div class="post">
			<h2 class="title"><a href="guest.php">Welcome to Tisha's Book Club Management </a></h2>
			<div class="entry">
				<p>This is <strong>BlackPolish</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.   The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
			</div>
		</div>
	</div>
	<!-- end #page -->
	<div id="featured-content">
		<div id="column1">
			<h2>Maecenas luctus</h2>
			<p><img src="assets/img/bg.jpg" width="300" height="150" alt="" /></p>
			<p>Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie.</p>
			<p class="button"><a href="#">Read More</a></p>
		</div>
		<div id="column2">
			<h2>Fusce fringilla</h2>
			<p><img src="assets/img/logo1.png" width="300" height="150" alt="" /></p>
			<p>Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie.</p>
			<p class="button"><a href="#">Read More</a></p>
		</div>
		<div id="column3">
			<h2>Praesent mattis</h2>
			<p><img src="assets/img/logotext1.png" width="300" height="150" alt="" /></p>
			<p>Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Mauris quam enim, molestie.</p>
			<p class="button"><a href="#">Read More</a></p>
		</div>
	</div>
</div>
<div id="footer-content-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<h2>Fusce ultrices fringilla</h2>
			<ul class="style1">
				<li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
				<li><a href="#">Etiam rhoncus volutpat erat</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
				<li><a href="#">Mauris vulputate dolor sit amet nibh</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
			</ul>
		</div>
		<div id="fbox2">
			<h2>Nulla luctus eleifend</h2>
			<ul class="style1">
				<li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
				<li><a href="#">Etiam rhoncus volutpat erat</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
				<li><a href="#">Mauris vulputate dolor sit amet nibh</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
			</ul>
		</div>
		<div id="fbox3">
			<h2>Maecenas luctus lectus</h2>
			<ul class="style1">
				<li class="first"><a href="#">Maecenas luctus lectus at sapien</a></li>
				<li><a href="#">Etiam rhoncus volutpat erat</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
				<li><a href="#">Mauris vulputate dolor sit amet nibh</a></li>
				<li><a href="#">Etiam posuere augue sit amet nisl</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="footer">
	<p>&copy; Untitled. All rights reserved. Images by <a href="http://fotogrph.com/">Fotogrph</a>. Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
