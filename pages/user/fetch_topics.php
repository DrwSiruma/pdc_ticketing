<?php
include('../../includes/connection.php');

$designation = $_GET['designation'];
$result = mysqli_query($conn, "SELECT id, name FROM tbl_itemcategory WHERE designation = '$designation'");

$topics = [];
while ($row = mysqli_fetch_assoc($result)) {
    $topics[] = $row;
}

header('Content-Type: application/json');
echo json_encode($topics);
?>
