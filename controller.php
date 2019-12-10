
<?php
include "DatabaseAdapter.php";
$theDBA = new DatabaseAdaptor();
// $userName = $_GET["userName"];
// $passWord = $_GET["passWord"];
$item = $_GET["item"];

$arr = $theDBA->getItem($item);

// if ($catg == 'Actors'){
//     $arr = $theDBA->getActors($srh);
// } else if ($catg == 'Movies'){
//     $arr = $theDBA->getMovies($srh);
// } else if ($catg == 'Roles'){
//     $arr = $theDBA->getRoles($srh);
// }
echo json_encode($arr);



?>
