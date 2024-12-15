<!DOCTYPE HTML>
<html>
<head>
    <title>Edison Volt</title>
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
			<a href="/project/" class="mx-2">Template</a>
			<a href="/project/search.php" class="mx-2">Search</a>
		</div>
	</div>
<!-- Wrapper -->

<div id="wrapper" class="divided">
    <!-- Banner -->
    <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
        <div class="content">
            <h1> Results Section </h1>
            <p class="major">Enter the name of your electric car</p>
            
            <form action="results.php" method="post">
                <label for="search_term">Search by brand, model, year, zip code</label>
                <input type="text" id="search_term" name="search_term" placeholder="Enter your electric car brand, model, year or zipcode">
                <input type="submit" value="Search">
                <input type="reset" value="Reset">
            </form>

            <p>
			<?php
                include("connect.php");

				$search_term = '%'; // Default value if no input is provided

				// Check if the form was submitted and the 'email_address' key exists
				if (isset($_POST['search_term']) && !empty($_POST['search_term'])) {
                    $search_term = mysqli_real_escape_string($linkID,$_POST['search_term']);
					$search_term = "%$search_term%";
				}

				// Prepare and execute the SQL query
				$result = mysqli_query($linkID, "SELECT VEHICLE.VEHICLE_ID,BRAND.BRAND_NAME,MODEL.MODEL_NAME, VEHICLE.YEAR, VEHICLE.NUMBER_OF_MILES, VEHICLE.BATTERY_RANGE,  VEHICLE.COLOR, VEHICLE.PRICE,  VEHICLE.IMAGES, ZIP_CODE.CITY, ZIP_CODE.STATE, ZIP_CODE.ZIP_CODE
                FROM VEHICLE
                JOIN  MODEL ON VEHICLE.MODEL_ID = MODEL.MODEL_ID
                JOIN BRAND ON VEHICLE.BRAND_ID = BRAND.BRAND_ID
                JOIN ZIP_CODE ON VEHICLE.ZIP_CODE = ZIP_CODE.ZIP_CODE
                WHERE BRAND.BRAND_NAME LIKE '$search_term' OR MODEL.MODEL_NAME LIKE '$search_term' OR VEHICLE.YEAR LIKE '$search_term' OR ZIP_CODE.ZIP_CODE LIKE '$search_term'");

				if (mysqli_num_rows($result) > 0) {
					print "<table>";
					print "<tr> <th> Vehicle ID </th> <th> Brand </th> <th> Model </th> <th> Year </th><th> Color </th> <th> Price </th><th> Zip Code </th><th> Image </th></tr>";
					while($row = mysqli_fetch_assoc($result)) {
						print "<tr> <td> $row[VEHICLE_ID] </td> <td> $row[BRAND_NAME] </td> <td> $row[MODEL_NAME] </td> <td> $row[YEAR] </td> <td> $row[COLOR] </td><td> $row[PRICE] </td><td> $row[ZIP_CODE] </td><td><img src='{$row['IMAGES']}' alt='{$row['MODEL_NAME']}' style='width:100px; height:auto;'></td></tr>";
					}
					print "</table>";
				} else {
					print "<p>No results found.</p>";
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
</body>
</html>
