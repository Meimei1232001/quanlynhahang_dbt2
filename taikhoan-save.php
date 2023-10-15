<?php
    include("./common/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu POST
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        // Lấy dữ liệu từ biểu mẫu POST
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        $nhan_vien_id = $_POST["nhan_vien_id"];
        if($id){
            $sql = "UPDATE accounts 
                    SET username = '$username', role = '$role', nhan_vien_id= $nhan_vien_id
                    WHERE account_id = $id";
        } else {
            $sql = "INSERT INTO accounts (username,password, role, nhan_vien_id)
            VALUES ('$username', '$password', '$role', $nhan_vien_id)";
        }
            echo $sql;
        if (mysqli_query($conn, $sql)) {
            header("Location: ./taikhoan.php");
            exit();
        } else {
            echo "Có lỗi xảy ra" . mysqli_error($conn);
        }

        // Đóng kết nối đến cơ sở dữ liệu
        mysqli_close($conn);
    } else {
        echo "Phương thức yêu cầu không hợp lệ.";
    }
?>