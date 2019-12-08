<?php
include "DatabaseAdapter.php";
$theDBA = new DatabaseAdaptor();
$srh = $_GET["srh"];
$catg = $_GET["catg"];
if ($catg == 'Actors'){
    $arr = $theDBA->getActors($srh);
} else if ($catg == 'Movies'){
    $arr = $theDBA->getMovies($srh);
} else if ($catg == 'Roles'){
    $arr = $theDBA->getRoles($srh);
}
echo json_encode($arr);
?>