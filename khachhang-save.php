<?php
    include("./common/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu POST
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        // Lấy dữ liệu từ biểu mẫu POST
        $ten_khach_hang = $_POST["ten_khach_hang"];
        $so_dien_thoai = $_POST["so_dien_thoai"];
        if($id){
            $sql = "UPDATE khachhang 
                    SET ten_khach_hang = '$ten_khach_hang', so_dien_thoai = '$so_dien_thoai'
                    WHERE id = $id";
        } else {
            $sql = "INSERT INTO khachhang (ten_khach_hang,so_dien_thoai)
            VALUES ('$ten_khach_hang', '$so_dien_thoai')";
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: ./khachhang.php");
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