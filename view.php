<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Best Price</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles.css">

<body>

	<h2>Search Buyer's Post</h2>
	<br>

	<input type="text" id="inp">
	<br>
	<br>
	<input type="button" name="item" value="Search"
		onclick="comunicate()">
	<br>
	<br>

	<a href="login.html">Login<a>
		<br>
		    <br>
	<a href="./register.php?mode=login">Register<a>

	<div id="change"></div>
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
					test.innerHTML = respon;
					//change.innerHTML += respon;
					var res = JSON.parse(ajax.responseText);
					var disply = "<br><table>";

					for (var i = 0; i < res.length; i++) {
							disply += "<tr><td>" + res[i].description + "</tr></td>";
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
