<?php
// Jiatian Wang
// Jialiang Wang

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
      <img src="BestPriceIcon.png" alt="Best Price Icon" height="50" width="200">
        <h3 class="slogan">Gives you the <b>Be$t Price !</b></h3>
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
      <h2>What you want to buy?</h2>

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
        Acceptable Condition:&nbsp;&nbsp;&nbsp;<select name="conditions" class="btn btn-secondary dropdown-toggle" required>
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


 <!-- Search deal -->
    <div class="wrapper">
     <h2>Search Buyer's Post</h2>
     <br>
     <form onsubmit="comunicate();return false">
   	<input type="text" id="inp" class="form-control" required>
   	<br>
   	<input type="submit" class="btn btn-primary" name="item" value="Search">
   	<br>
   </form>

     </div>
     <div id="change" class="table_wrappper"></div>

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
            //test.innerHTML = respon;
             //change.innerHTML += respon;
             var res = JSON.parse(ajax.responseText);
             var disply = "<br><table class='table table-dark'><thead><tr>" +
         					"<th scope='col'>Brand</th>" +
   					      "<th scope='col'>Model</th>" +
   					      "<th scope='col'>Price</th>" +
   					      "<th scope='col'>Condition</th>" +
                  "<th scope='col'>Buyer</th>" +
   					    	"</tr>" +
   					  		"</thead>";
   					//test.innerHTML = respon;
   					for (var i = 0; i < res.length; i++) {
   							disply += "<tr><td>" + res[i].brand + "</td><td>" + res[i].model +
   							 "</td><td>" + res[i].price + "</td><td>" + res[i].conditions +
                 "</td><td>" + res[i].username + "</tr></td>";
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
