<!DOCTYPE HTML>
<html>
<head>
    <title>~Results Section ~</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">

<!-- Wrapper -->
<!-- Atanas was here -->
<div id="wrapper" class="divided">

    <!-- Banner -->
    <section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
        <div class="content">
            <h1> Results Section </h1>
            <p class="major">Enter dealer email address to search</p>
            
            <form action="results.php" method="post">
                <label for="email_address">Email Address:</label>
                <input type="text" id="email_address" name="email_address" placeholder="Enter part of the email address">
                <input type="submit" value="Search">
            </form>

            <p>
			<?php
				$email_address = '%'; // Default value if no input is provided

				// Check if the form was submitted and the 'email_address' key exists
				if (isset($_POST['email_address']) && !empty($_POST['email_address'])) {
					$email_address = $_POST['email_address'];
				}

				include("connect.php");

				// Prepare and execute the SQL query
				$result = mysqli_query($linkID, "SELECT DEALER_ID, EMAIL_ADDRESS, LICENSE, DEALER_RATING FROM DEALER WHERE EMAIL_ADDRESS LIKE '%$email_address%'");

				if (mysqli_num_rows($result) > 0) {
					print ("<table>");
					print ("<tr> <th> Dealer ID </th> <th> Email Address </th> <th> License </th> <th> Rating </th> </tr>");
					while($row = mysqli_fetch_array($result)) {
						print ("<tr> <td> $row[DEALER_ID] </td> <td> $row[EMAIL_ADDRESS] </td> <td> $row[LICENSE] </td> <td> $row[DEALER_RATING] </td> </tr>");
					}
					print("</table>");
				} else {
					print("<p>No results found.</p>");
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
</body>
</html>
