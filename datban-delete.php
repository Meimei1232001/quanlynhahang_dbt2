<?php
include('./common/connection.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sql = "DELETE FROM khachhang WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: ./khachhang.php"); 
        exit();
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    echo "Không có ID để xóa.";
}
?>