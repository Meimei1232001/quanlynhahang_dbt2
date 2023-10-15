<?php
    include("./common/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu POST
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        // Lấy dữ liệu từ biểu mẫu POST
        $tenmon = $_POST["ten_mon"];
        $dongia = $_POST["don_gia"];
        if($id){
            $sql = "UPDATE thucdon 
                    SET ten_mon = '$tenmon', don_gia = '$dongia'
                    WHERE id = $id";
        } else {
            $sql = "INSERT INTO thucdon (ten_mon, don_gia)
            VALUES ('$tenmon', $dongia)";
        }
        

        if (mysqli_query($conn, $sql)) {
            header("Location: ./menu.php");
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