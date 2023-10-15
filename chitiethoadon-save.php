<?php
    include("./common/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ biểu mẫu POST
        $id = isset($_POST["id"]) ? $_POST["id"] : null;
        // Lấy dữ liệu từ biểu mẫu POST
        $ma_hoa_don = $_POST["ma_hoa_don"];
        $mon_an_id = $_POST["mon_an_id"];
        $so_luong = $_POST["so_luong"];
        $redirect_url = $_POST["redirect_url"];
        if($id){
            $sql = "UPDATE chitiethoadon 
                    SET ma_hoa_don = $ma_hoa_don, mon_an_id = $mon_an_id, so_luong= $so_luong
                    WHERE id = $id";
        } else {
            $sql = "INSERT INTO chitiethoadon (ma_hoa_don,mon_an_id, so_luong)
            VALUES ('$ma_hoa_don', $mon_an_id, $so_luong)";
        }
        if (mysqli_query($conn, $sql)) {
            header("Location: $redirect_url");
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