<?php 
session_start();

// Kiểm tra nếu có session đã tồn tại (người dùng đã đăng nhập)
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
    exit();
}
?>