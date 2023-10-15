<?php
    include("./common/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu POST
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        // Lấy dữ liệu từ biểu mẫu POST
        $manhanvien = $_POST["ma_nhan_vien"];
        $tennhanvien = $_POST["ten_nhan_vien"];
        $sodienthoai = $_POST["so_dien_thoai"];
        $chucvu = $_POST["chuc_vu"];
        $calamviec = $_POST["ca_lam_viec"];
        $luong = $_POST["luong"];
        if($id){
            $sql = "UPDATE nhanvien 
                    SET ma_nhan_vien = '$manhanvien', ten_nhan_vien = '$tennhanvien', so_dien_thoai= '$sodienthoai',
                    chuc_vu = '$chucvu', ca_lam_viec = '$calamviec', luong = $luong
                    WHERE id = $id";
        } else {
            $sql = "INSERT INTO nhanvien (ma_nhan_vien, ten_nhan_vien, so_dien_thoai, chuc_vu, ca_lam_viec, luong)
            VALUES ('$manhanvien', '$tennhanvien', '$sodienthoai', '$chucvu', '$calamviec', $luong)";
        }
        

        if (mysqli_query($conn, $sql)) {
            header("Location: ./nhanvien.php");
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