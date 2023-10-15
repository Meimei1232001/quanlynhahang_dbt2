<?php
    include("./common/connection.php");
    if (isset($_GET['hoadonid']) && isset($_GET['total']) && isset($_GET['ban'])) {
        $hoadonid = $_GET['hoadonid'];
        $total = $_GET['total'];
        $ban = $_GET['ban'];
        $sql = "UPDATE hoadon 
                SET trang_thai = 'Đã thanh toán', tong_tien = $total
                WHERE ma_hoa_don = $hoadonid";
        mysqli_query($conn, $sql);
        
        $sqlUpdateBan = "UPDATE ban set trang_thai = 'FREE',ma_hoa_don=null where code = '$ban'";
        mysqli_query($conn, $sqlUpdateBan);
        header("Location: ./datban.php");
        exit();
    }
?>