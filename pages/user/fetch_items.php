<?php
include('../../includes/connection.php');

$designation = $_GET['designation'];
$topic = $_GET['topic'];
$result = mysqli_query($conn, "
    SELECT l.id, l.name 
    FROM tbl_itemlist l
    LEFT JOIN tbl_itemcategory c ON l.category = c.id
    WHERE c.designation = '$designation' AND l.category = '$topic'
");

$items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
}

header('Content-Type: application/json');
echo json_encode($items);
?>