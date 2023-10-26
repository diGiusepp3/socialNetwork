<?php

// header.php
	echo '
<!DOCTYPE html>
<html lang="nl-BE">
<head>
    <title>' . ($pagetitle ?? "Webcrafters socialfeed") . '</title>
    <meta name="keywords" content="' . ($keywords ?? "Webcrafters, socialfeed, vrienden, chat, praat, social media, platform") . '">
    <meta name="description" content="' . ($description ?? "Welkom op het social media platform van webcrafters") . '">

	<!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.min.css">
    
    <!-- Scripts -->
    <script src="/scripts/jquery/jquery-3.7.1.min.js"></script>
</head>

<body>
    <header>
        <nav class="d-flex flex-row">
        	<div class="logo-and-search">
	            <div class="logo">
	                <h1 style="font-weight: bold">&lt;/&gt;</h1>
				</div>
			
				<div class="search-field">
					<input type="text" name="search" placeholder="Zoeken">
				</div>
			</div>
		
			<div class="header-icons">
				<a href="/">
					<i class="fas fa-home"></i>
				</a>
				<a href="/pages/friends">
					<i class="fas fa-users"></i>
				</a>
				<a href="/pages/video">
					<i class="fas fa-video"></i>
				</a>
				<a href="/pages/groups">
					<i class="fas fa-people-group"></i>
				</a>
				<a href="/pages/games">
					<i class="fas fa-gamepad"></i>
				</a>
				
			</div>
		
			<div class="user-related-icons">
				<i class="fas fa-list-ul"></i>
				<i class="fas fa-comments"></i>
				<div class="user-image">';
					if (isset($_SESSION['loggedin'])) {
						$profileImage = $_SESSION['profileImage'];
						$user_id = $_SESSION['userId'];
						$username = $_SESSION['username'];
						echo'
							<img class="profile-image" src="/pages/users/'.$user_id . '/images/profile-image/' . $profileImage .'" class="profile-image" alt="profielfoto' . $username . '">
							<i class="icon fa fa-chevron-down" onclick="toggleUserMenu()"></i>
						';
					} else {
						$defaultImage = '/images/icons/default-user-icon.webp';
						$profileImage = $defaultImage;
						$user_id = '0';
						echo'
							<img class="profile-image" src="'.$defaultImage.'" alt="'.$defaultImage.'">
							<i class="icon fa fa-chevron-down" onclick="toggleUserMenu()"></i>
						';
					} echo'
				</div>
				<div id="user-menu" class="hidden user-menu p-2">
		            <div class="user-profile">
		                <img class="profile-image" src="/pages/users/'.$user_id . '/images/profile-image/' . $profileImage .'" alt="profielfoto: ' . $username . '">
		                <span class="user-name">' . $username . '</span>
		            </div>
		            <hr>
		            <div class="menu-items d-flex flex-column ">
		                <a href="#">Item 1</a>
		                <a href="#">Item 2</a>
		                <a href="#">Item 3</a>
		                <a href="#">Logout</a>
		            </div>
        		</div>
			</div>
        </nav>
    </header>
     <script>
    function toggleUserMenu() {
	    var userMenu = document.getElementById("user-menu");
	    userMenu.classList.toggle("hidden");
	}
    </script>
';


