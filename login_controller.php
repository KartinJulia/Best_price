<?php
include "loginAdapter.php";
$theDBA = new LoginAdapter();
// $userName = $_GET["userName"];
// $passWord = $_GET["passWord"];
$userName = $_GET["userName"];
$passWord = $_GET["passWord"];
$arr = $theDBA->getUser($userName,$passWord);

// if ($catg == 'Actors'){
//     $arr = $theDBA->getActors($srh);
// } else if ($catg == 'Movies'){
//     $arr = $theDBA->getMovies($srh);
// } else if ($catg == 'Roles'){
//     $arr = $theDBA->getRoles($srh);
// }
echo json_encode($arr);
?>
