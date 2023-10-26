<?php
	
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header('Location: /pages/profile/login.php');
		exit();
	}
	// index.php
	require ('ini.inc');
	$pagetitle = 'Webcrafters social';
	$keywords = 'Webcrafters, socialfeed, vrienden, chat, praat, social media, platform';
	$description = 'Welkom op het social media platform van webcrafters.';
	require('header.php');
	
	
	$storiesSql = "
		SELECT `username`, `story`, `folder`, `type`, `timestamp`
		FROM `stories`
		ORDER BY `timestamp` DESC
		LIMIT 4;
	";
	
	$storiesResult = $conn->query($storiesSql);

	
	echo'
	<main>
		<aside class="asideLeft w-25">
		
		</aside>
		
		<div class="container-fluid w-50 h-100 justify-content-center d-flex flex-column justify-content-center">
			<h2 class="w-100 text-center">Verhalen</h2><br>
			<div class="storiesTop d-flex flex-row justify-content-center align-items-stretch p-2 mt-2 w-100">
				';
				if ($storiesResult->num_rows > 0) {
					while ($storiesRow = $storiesResult->fetch_assoc()) {
						$username = $storiesRow['username'];
						$story = $storiesRow['story'];
						$folder = $storiesRow['folder'];
						$type = $storiesRow['type'];
						
						echo '
						<div class="story d-flex justify-content-center flex-column rounded-bottom-5 rounded-top-5">
							<img src=" ' . $folder.$story . ' " alt="Verhaal van $username" class="rounded-top-5">
							<h4 class="text-center">' . $username . '</h4>
						</div>';
					}
				} else {
					echo '<p>Geen verhalen beschikbaar.</p>';
				}
				echo '
			</div>
			<div class="postMessage d-flex flex-row w-50 m-auto rounded-2 mt-2">
			    <img class="profile-image p-2" src="/pages/users/' . $user_id . '/images/profile-image/' . $profileImage .'" alt="profielfoto: ' . $username . '">
			    <div class="postPopup" id="postPopup"> <!-- Voeg een ID toe om het element te selecteren -->
			        <form method="post" name="newPost">
			            <textarea placeholder="Wat wil je posten, ' . $username . '"></textarea>
			            <input type="submit" value="plaatsen">
			        </form>
			    </div>
			    <input class="newPostToggler rounded-2 p-1 m-1" type="text" placeholder="Wat wil je doen?" name="storyPost" onclick="openPostPopup()">
			    <div class="newPostIcons">
			    	<i class="fas fa-video"></i>
			    	<i class="fas fa-image"></i>
			    	<i class="fas fa-emoji"></i>
				</div>
			</div>

		</div>
		
		<aside class="asideRight w-25">
		
		</aside>

	</main>
	<script>
		document.addEventListener("click", function(event) {
		    var popup = document.querySelector(".postPopup");
		    var newPostToggler = document.querySelector(".newPostToggler");
		    var textarea = popup.querySelector("textarea");
		
		    if (event.target !== popup && event.target !== newPostToggler && event.target !== textarea) {
		        if (popup.style.display === "block") {
		            popup.style.display = "none";
		            newPostToggler.style.display = "block";
		        }
		    }
		});
		
		function openPostPopup(event) {
		    var popup = document.querySelector(".postPopup");
		    var newPostToggler = document.querySelector(".newPostToggler");
		
		    if (popup.style.display === "none" || popup.style.display === "") {
		        popup.style.display = "block";
		        newPostToggler.style.display = "none";
		    } else {
		        popup.style.display = "none";
		        newPostToggler.style.display = "block";
		    }
		
		    // Stop de gebeurtenispropagatie om te voorkomen dat de klik buiten de popup onmiddellijk de popup sluit
		    event.stopPropagation();
		}

	</script>
	';
	require('footer.php');

