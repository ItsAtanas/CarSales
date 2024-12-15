<!DOCTYPE HTML>
<!--
	Story by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)

	Note: Only needed for demo purposes. Delete for production sites.
-->
<html>
	<head>
		<title>~Your Company Names Goes Here ~</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
    <div>
		<a href="/project/template.php">Template</a>
        <a href="/project/search.php">Search</a>
        <a href="/project/results.php">Results</a>
    </div>
		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1> Edison Volt </h1>
							<p class="major">Cars Ready for Purchase </p>
							<p>
<?php
	include("connect.php");
		$result = mysqli_query($linkID, "SELECT VEHICLE.VEHICLE_ID,BRAND.BRAND_NAME,MODEL.MODEL_NAME, VEHICLE.YEAR, VEHICLE.NUMBER_OF_MILES, VEHICLE.BATTERY_RANGE, VEHICLE.HORSEPOWER, VEHICLE.COLOR, VEHICLE.PRICE, VEHICLE.ELIGIBILITY_EV_SUBSIDY, VEHICLE.IMAGES, ZIP_CODE.CITY, ZIP_CODE.STATE
		FROM VEHICLE
		JOIN  MODEL ON VEHICLE.MODEL_ID = MODEL.MODEL_ID
		JOIN BRAND ON VEHICLE.BRAND_ID = BRAND.BRAND_ID
		JOIN ZIP_CODE ON VEHICLE.ZIP_CODE = ZIP_CODE.ZIP_CODE");
		if (mysqli_num_rows($result) > 0) {
			print "<table border='1'>";
			print "<tr><th>Vehicle ID</th><th>Brand</th><th>Model</th><th>Image</th></tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				$imageUrl = $row['IMAGES'];
				print "<tr>";
				print "<td>{$row['VEHICLE_ID']}</td>";
				print "<td>{$row['BRAND_NAME']}</td>";
				echo "<td>{$row['MODEL_NAME']}</td>";
				print "<td><img src='{$imageUrl}' alt='{$row['MODEL_NAME']}' class='img-fluid'></td>";
				print "</tr>";
			}
			print "</table>";
		} else {
			print "No vehicles found.";
		}
		mysqli_close($linkID);
	?>
</p>

</div>
						<div class="image">
							<img src="images/banner.jpg" alt="" />
						</div>
					</section>

							<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<p>&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

		<!-- Note: Only needed for demo purposes. Delete for production sites. -->
			<script src="assets/js/demo.js"></script>

	</body>
</html>
