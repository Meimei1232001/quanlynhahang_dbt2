<?php
include('./common/connection.php');
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $ban = $_GET["ban"];
    $hoadon= $_GET["hoadon"];
    
    $sql = "DELETE FROM chitiethoadon WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: ./datban-detail.php?ban=$ban&type=BUSY&hoadon=$hoadon"); 
        exit();
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    echo "Không có ID để xóa.";
}
?>
