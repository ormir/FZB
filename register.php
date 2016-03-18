<html>
<head>

<?php include("html.head.inc.php"); ?>
</head>
<body>
	<div class="row">
		<div class="col-md-6" id="containerlogin">
			<div id="loginbg">
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-md-offset-4" id="contentlogin">
			    	<form class="form-signin" id="loginform" method="post">
						<h1 class="form-signin-heading" id="logintitel">Anmelden</h1>
						<label for="logininputEmail" class="sr-only">Email address</label>
						<input type="email" id="logininputEmail" class="form-control" placeholder="Email" required autofocus>
						<label for="logininputPassword" class="sr-only">Password</label>
						<input type="password" id="logininputPassword" class="form-control" placeholder="Password" required>
						<div class="checkbox" id="logincheck">
							<label>
								<input type="checkbox" value="remember"></input> Meine Daten merken
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" onclick="loginBtnClick()" id="loginbtn" type="submit" value="submit">Anmelden</button>
					</form>
			    </div>
			</div>
		</div>
		<div class="col-md-6" id="containerregister">
			<div class="row">
				<div id="registerbg">
				</div>
				<div class="col-md-7 col-sm-6 col-md-offset-3" id="contentregister">
			    	<form class="form-signin" id="registerform" action="create_profile.php" method="post">
						<h1 class="form-signin-heading" id="registertitel">Registrieren</h1>
						<div class="row" id="regname" class="">
							<div class="col-md-4">
								Name
							</div>
							<div class="col-md-8">
								<input type="text" id="registerinputName" class="form-control" placeholder="Vorname" required> 
							</div>
						</div>
						<div class="row" id="reglastname">
							<div class="col-md-4">
								Nachname
							</div>
							<div class="col-md-8">
								<input type="text" id="registerinputNachname" class="form-control" placeholder="Nachname" required> 
							</div>
						</div>
						<div class="row" id="regemail">
							<div class="col-md-4">
								E-Mail
							</div>
							<div class="col-md-8">
								<input type="email" id="registerinputEmail" class="form-control" placeholder="Email Adresse" required autofocus>
							</div>
						</div>
						<div class="row" id="regbday">
							<div class="col-md-4">
								Geburtsdatum
							</div>
							<div class="col-md-8">
								<div class="row" id="regrowbday">
									<div class="col-md-4">
										<select class="form-control" id="regday">
											<option value="0" selected="1" id="selday" disabled="">Tag</option>
										</select>
									</div>
									<div class="col-md-4" >
										<select class="form-control" id="regmonth">
											<option value="0" selected="1" id="selmonth" disabled="">Monat</option>
										</select>
									</div>
									<div class="col-md-4">
										<select class="form-control" id="regyear">
											<option value="0" selected="1" id="selyear" disabled="">Jahr</option>
										</select>
									</div>								
								</div>
							</div>
						</div>
						<div class="row" id="regplace">
							<div class="col-md-4">
								Wohnort
							</div>
							<div class="col-md-8">
								<select class="form-control" id="selbezirk" required>
									<option value="0" selected="1" disabled="">Bezirk</option>
								</select>
							</div>
						</div>
						<div class="row" id="regpass">
							<div class="col-md-4">
								Passwort
							</div>
							<div class="col-md-8">
								<input type="password" id="registerinputPassword" class="form-control" placeholder="Passwort" required autofocus>
							</div>
						</div>
						<div class="row" id="regcheck">
							<div class="col-md-4">
							</div>
							<div class="col-md-8" >
								<label>
									<input type="checkbox" value="legal" ></input> Bestätigung der AGB
								</label>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-4" id="regbutton">
							<button class="btn btn-lg btn-primary btn-block " type="submit" value="submit">Registrieren</button>
						</div>
					</form>
			    </div>
			</div>
		</div>
	</div>

<footer>
	<!-- Aytac JS-->
	<script src="js/register.js"></script>
</footer>
</body>
</html>