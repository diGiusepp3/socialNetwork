<?php
	
	require('../../ini.inc');
	$pagetitle = 'login';
	include('../../header.php');

echo'
<main>
	<div class="container">
		<form id="login-form" method="post" action="/functions/account/login.php">
			<input type="text" name="email" placeholder="Email adres">
			<input type="password" name="password" placeholder="wachtwoord">
			<input type="submit" name="submit" value="Indienen" class="bg-dark text-white border-0">
		</form>
		<div id="login-response"></div>
	</div>
</main>

';
	include('../../footer.php');
