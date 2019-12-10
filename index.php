<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Best Price Main</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="page-header">
        <h2><b>Be$t Price</b> will gve you the <b>Be$t Price !</b></h2>
    </div>
    <div class="welcome">
      Welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
  
    <p>
        <a href="reset_password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</div>


<!-- Post deal -->
    <div class="wrapper">
      <h2>Post Your Deal</h2>

      <form action="post_controller.php" method="get">

        <div class="form-group">
        Brand:<input type="text" name="brand" class="form-control" required>
        </div>
        <div class="form-group">
        Model:<input type="text" name="model" class="form-control" required>
      </div>
      <div class="form-group">
        Price:<input type="text" name="price" class="form-control" required>
      </div>
      <div class="form-group">
        Condition:&nbsp;&nbsp;&nbsp;<select name="conditions" class="btn btn-secondary dropdown-toggle" required>
          <option value="good">Good</option>
          <option value="acceptable">Acceptable</option>
          <option value="brandnew">Brand New</option>
          <option value="bad">Bad</option>
          <option value="broken">Broken</option>
         </select>
      </div>
        <input type="submit" class="btn btn-primary" value="Post">
      </form>
    </div>

<!-- <script>
    function post(){

      var post_res = document.getElementById("post_res");
      post_res.innerHTML = "0";

      var brand = document.getElementById("brand");
      var model = document.getElementById("model");
      var price = document.getElementById("price");
      var conditions = document.getElementById("conditions");
      post_res.innerHTML = "1";
      var ajax = new XMLHttpRequest();
      post_res.innerHTML = "2";
      ajax.open("GET", "post_controller.php?brand=" + brand.value + "&model=" + model.value + "&price=" + price.value + "&conditions=" + conditions.value,
          true);
      post_res.innerHTML = "3";
      ajax.send();
      post_res.innerHTML = "4";
      ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
          var respon = ajax.responseText;
          var res = JSON.parse(ajax.responseText);

          post_res.innerHTML = res;

          post_res.innerHTML = "5";
        }
      };
    }
    </script> -->



 <!-- Search deal -->
    <div class="wrapper">
     <h2>Search Buyer's Post</h2>
     <br>
     <input type="text" id="inp">
     <br>
     <br>
     <input type="button" class="btn btn-primary" name="item" value="Search"
       onclick="comunicate()">
     <br>
     <br>
     <div id="change"></div>
     </div>
     <div id="test"></div>
     <script>
       function comunicate() {
         var change = document.getElementById("change");
         var test = document.getElementById("test");
         var x = document.getElementById("inp");
         var ajax = new XMLHttpRequest();
         ajax.open("GET", "controller.php?item=" + x.value,
             true);
         ajax.send();
         ajax.onreadystatechange = function() {
           if (ajax.readyState == 4 && ajax.status == 200) {
             var respon = ajax.responseText;
             // test.innerHTML = respon;
             //change.innerHTML += respon;
             var res = JSON.parse(ajax.responseText);
             var disply = "<br><table>";

             for (var i = 0; i < res.length; i++) {
                 disply += "<tr><td>" + res[i].brand + "|" + res[i].model +
                  "|" + res[i].price + "|" + res[i].conditions + "</tr></td>";
               };
             disply += "</table>";
             change.innerHTML = disply;
             if (res.length == 0) {
               change.innerHTML = "No matches for '" + x.value + "'";
             }
             ;
           }
         };
       }

     </script>



</body>
</html>
