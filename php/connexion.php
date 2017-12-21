<?php

echo '<!-- LOGIN FORM -->
<link rel="stylesheet" href="./CSS/monCSS.css">
<div class="text-center" style="padding:50px 0">
	<div class="logo">Connexion</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="Pseudo" required>
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="mot de passe (inactif)" readonly>
					</div>
					
				</div>
				<button type="button" onclick="testPseudo()" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			
		</form>
	</div>
	<!-- end:Main Form -->
</div>';
