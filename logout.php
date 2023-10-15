<?php
    session_start(); // Khởi động phiên làm việc (session)

    // Xóa toàn bộ thông tin phiên làm việc
    session_destroy();

    // Điều hướng người dùng về trang đăng nhập hoặc trang chính của bạn
    header("Location: login.php");
    exit;
?>