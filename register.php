<?php 
include("common.inc.php");
include("login.inc.php");

if(isset($_SESSION["user_id"])){
	header("location:index.php");
}
?>
<html>
<head>
<?php 
include("html.head.inc.php"); 
include("register.inc.php");
?>
</head>
<body>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6" id="containerlogin">
			<div id="loginbg"></div>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3" id="contentlogin">
			    	<form class="form-signin" id="loginform" method="post" action="register.php">
						<h1 class="form-signin-heading" id="logintitel">Anmelden</h1>
						<label for="logininputEmail" class="sr-only">Email address</label>
						<input type="text" id="logininputEmail" class="form-control" placeholder="Email" name="email" autofocus>
						<label for="logininputPassword" class="sr-only">Password</label>
						<input type="password" id="logininputPassword" class="form-control" placeholder="Password" name="password" required>
						<div class="checkbox" id="logincheck">
							<label>
								<input type="checkbox" value="remember"></input>Meine Daten merken
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" id="loginbtn" type="submit" value="submit" name="loginsubmit">Anmelden</button>
					</form>
			    </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6" id="containerregister">
			<div class="row">
				<div id="registerbg"></div>
				<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2" id="contentregister">
			    	<form class="form-signin" id="registerform" action="register.php" method="post">
						<h1 class="form-signin-heading" id="registertitel">Registrieren</h1>
						<div class="row reg-input" id="regname">
							<div class="col-xs-4 col-sm-4 col-md-4">Name</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input type="text" id="registerinputName" class="form-control" name="firstname" placeholder="Vorname" required> 
							</div>
						</div>
						<div class="row reg-input" id="reglastname">
							<div class="col-xs-4 col-sm-4 col-md-4">Nachname</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input type="text" id="registerinputNachname" class="form-control" name="lastname" placeholder="Nachname" required> 
							</div>
						</div>
						<div class="row reg-input" id="regemail">
							<div class="col-xs-4 col-sm-4 col-md-4">E-Mail</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input type="email" id="registerinputEmail" class="form-control" name="email" placeholder="Email Adresse" required autofocus>
							</div>
						</div>
						<div class="row reg-input" id="regusername">
							<div class="col-xs-4 col-sm-4 col-md-4">Benutzername</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input type="text" id="registerinputUsername" class="form-control" name="username" placeholder="Benutzername" required autofocus>
							</div>
						</div>
						<div class="row reg-input" id="regbday">
							<div class="col-xs-4 col-sm-4 col-md-4">Geburtsdatum</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<div class="row" id="regrowbday">
									<div class="col-xs-4 col-sm-4 col-md-4 birthday">
										<select class="form-control" id="regday">
											<option value="0" selected="1" name="birthday" id="selday" disabled="">Tag</option>
										</select>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 birthmonth" >
										<select class="form-control" id="regmonth">
											<option value="0" selected="1" id="selmonth" name="birthmonth" disabled="">Monat</option>
										</select>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 birthyear">
										<select class="form-control" id="regyear">
											<option value="0" selected="1" id="selyear" name="birthyear" disabled="">Jahr</option>
										</select>
									</div>								
								</div>
							</div>
						</div>
						<div class="row reg-input" id="regstreet">
							<div class="col-xs-4 col-sm-4 col-md-4">Wohnadresse</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input type="text" id="registerinputAddress" class="form-control" placeholder="Adresse" name="street" required> 
							</div>
						</div>
						<div class="row reg-input" id="regcity">
							<div class="col-xs-4 col-sm-4 col-md-4">Bundesland</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<select class="form-control" id="selort" name="city" required>
									<option value="wien" selected="1" >Wien</option>
								</select>
							</div>
						</div>
						<div class="row reg-input" id="regplace">
							<div class="col-xs-4 col-sm-4 col-md-4">Bezirk</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<select class="form-control" id="selbezirk" name="postcode" required>
									
								</select>
							</div>
						</div>
						<div class="row reg-input" id="regpass">
							<div class="col-xs-4 col-sm-4 col-md-4">Passwort</div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<input name="password" type="password" id="registerinputPassword" class="form-control" placeholder="Passwort" required autofocus>
							</div>
						</div>
						<div class="row reg-input" id="regcheck">
							<div class="col-xs-4 col-sm-4 col-md-4"></div>
							<div class="col-xs-8 col-sm-8 col-md-8">
								<label>
									<input type="checkbox" value="legal"></input> Bestätigung der AGB
								</label>
							</div>
						</div>
						<div class="col-xs-8 col-xs-offset-4 col-sm-8 col-sm-offset-4 col-md-8 col-md-offset-4 reg-input" id="regbutton">
							<button class="btn btn-lg btn-primary btn-block " type="submit" value="submit" name="registersubmit">Registrieren</button>
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