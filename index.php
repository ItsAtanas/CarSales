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
    <!-- Menu -->
	<div>
		<div class="custom-navbar-icon d-flex justify-content-center align-items-center">
			<a href="/project/"><img src="images/Edison-Volt.png" alt="Logo" style="width: 150px; height: auto; margin-right: 10px;"></a>
		</div>
		<div class="custom-navbar d-flex justify-content-center align-items-center">
			<a href="/project/" class="mx-2">Home</a>
			<a href="/project/search.php" class="mx-2">Search</a>
		</div>
	</div>
		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1 class="temp-title"> Edison Volt </h1>
							<p class="major temp-text">Cars Ready for Purchase </p>
							<p>
								<?php
								include("connect.php");
								$result = mysqli_query($linkID, "SELECT VEHICLE.VEHICLE_ID, BRAND.BRAND_NAME, MODEL.MODEL_NAME, VEHICLE.YEAR, VEHICLE.NUMBER_OF_MILES, VEHICLE.BATTERY_RANGE, VEHICLE.HORSEPOWER, VEHICLE.COLOR, VEHICLE.PRICE, VEHICLE.ELIGIBILITY_EV_SUBSIDY, VEHICLE.IMAGES, ZIP_CODE.CITY, ZIP_CODE.STATE
								FROM VEHICLE
								JOIN MODEL ON VEHICLE.MODEL_ID = MODEL.MODEL_ID
								JOIN BRAND ON VEHICLE.BRAND_ID = BRAND.BRAND_ID
								JOIN ZIP_CODE ON VEHICLE.ZIP_CODE = ZIP_CODE.ZIP_CODE");

								if (mysqli_num_rows($result) > 0) {
									print "<table border='1'>";
									print "<tr><th>Vehicle ID</th><th>Brand</th><th>Model</th><th>Image</th><th>Price</th></tr>"; // Added <th> for Price
									while ($row = mysqli_fetch_assoc($result)) {
										$imageUrl = $row['IMAGES'];
										print "<tr>";
										print "<td>{$row['VEHICLE_ID']}</td>";
										print "<td>{$row['BRAND_NAME']}</td>";
										print "<td>{$row['MODEL_NAME']}</td>";
										print "<td><img src='{$imageUrl}' alt='{$row['MODEL_NAME']}' class='img-fluid vehicle-image'></td>";
										print "<td>\${$row['PRICE']}</td>"; // Added <td> for Price
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
					</section>

							<footer class="footer-color wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<p style="color: white; margin-bottom: 0px;" >&copy; Edison Volt.</p>
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
