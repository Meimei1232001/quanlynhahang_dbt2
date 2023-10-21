<?php
// Kết nối đến cơ sở dữ liệu MySQL
include('../common/connection.php'); // Import tệp kết nối đã tạo

// Xử lý đăng nhập khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Truy vấn kiểm tra tài khoản trong cơ sở dữ liệu
    $sql = "SELECT * FROM accounts WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Đăng nhập thành công
        session_start();
        $row = mysqli_fetch_assoc($result); // Lấy dòng đầu tiên từ kết quả

        $_SESSION['username'] = $username; // Lưu tên đăng nhập vào phiên làm việc (session)
        $_SESSION['userid'] = $row['account_id']; // Lưu tên đăng nhập vào phiên làm việc (session)
        $_SESSION['role'] = $row['role']; // Lưu tên đăng nhập vào phiên làm việc (session)
        header("Location: ../index.php"); // Chuyển hướng đến trang chào mừng
        exit();
    } else {
        // Đăng nhập không thành công
        header("Location: ../login.php?authen=failed"); // Chuyển hướng đến trang đăng nhập với thông báo lỗi
        exit();
    }
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>