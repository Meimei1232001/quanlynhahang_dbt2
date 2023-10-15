<?php
$servername = "localhost"; // Thay thế bằng tên máy chủ MySQL của bạn
$username = "root"; // Thay thế bằng tên người dùng MySQL của bạn
$password = "abcde12345-"; // Thay thế bằng mật khẩu MySQL của bạn
$database = "dbt2"; // Thay thế bằng tên cơ sở dữ liệu của bạn

$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
?>