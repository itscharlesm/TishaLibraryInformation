<?php

    if(time()-$_SESSION["login_time_stamp"] > 900)
	{
        echo "<script>alert('Session timeout. Please login.'); window.location.href = './pages/login.php';</script>";
        session_destroy();
        exit();
	}
?>