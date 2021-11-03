<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Contact Tijara</title>
	<meta charset="utf-8" />
	<meta http-equiv="Cache-control" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="icon" href="images/minilogo.png">
</head>

<body class="is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">
			<h1><a href="index.html"><img src="images/biglogo.png" width="10%"></a></h1>
			<nav id="nav">
				<ul>
				<li><a href="index.html">Home</a></li>
					<li><a href="tarif.html">Tarif</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main -->
		<section id="main" class="container medium">
			<header>
				<h2>Contacter nous</h2>
				<p>Dites-nous ce que vous pensez de notre petite opération.</p>
			</header>
			<div class="box">
				<h4 class="sent-notification"></h4>
				<form method="POST" id="form" action="php/mail.php" >
					<div class="row gtr-50 gtr-uniform">
						<div class="col-6 col-12-mobilep">
							<input type="text" name="name" id="name" value="" placeholder="Nom" required />
						</div>
						<div class="col-6 col-12-mobilep">
							<input type="email" name="email" id="email" value="" placeholder="Email" required/>
						</div>
						<div class="col-12">
							<input type="text" name="subject" id="subject" value="" placeholder="Sujet" required/>
						</div>
						<div class="col-12">
							<textarea name="message" id="message" placeholder="Entrer votre message" rows="6"></textarea>
						</div>
						<div class="col-12">
							<ul class="actions special">
								<li><input type="submit" name="submit" value="Envoyer" /></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
			</ul>
			<ul class="copyright">
				<li>  &copy;All rights reserved. Proton Technologies.</li>
			</ul>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</body>

</html>