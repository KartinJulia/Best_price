
<?php
include "DatabaseAdapter.php";
$theDBA = new DatabaseAdaptor();
$item = $_GET["item"];
$arr = $theDBA->getItem($item);
echo json_encode($arr);
?>
