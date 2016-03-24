	<div class="container-fluid">
		<div class="row">
			<a href="index.php">
				<div class="headericon col-sm-1 col-md-1">
					<img alt="Integration Wien" id="logo_iw" src="images/ic_integration_wien.png">
				</div>
			</a> <!-- /.headericon col-md-1 -->
			<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-2" id="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Suche">
					<span class="input-group-btn">
						<a href="search.php">
							<button class="btn btn-default" type="button"><img src="images/ic_focus.png" alt="Suche"></button>
						</a>
					</span>
				</div> <!-- /.input-group -->
			</div> <!-- /#search -->
			<div class="col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-0">
				<div class="row">
					<div class="headericon col-sm-2 col-sm-offset-0 col-md-2 col-md-offset-3">
						<img class="dropdown-toggle" data-toggle="dropdown" alt="Benachrichtigung" id="logo_iw" src="images/ic_notification.png">
						<span class="badge">2</span>
						<ul class="dropdown-menu dropdown-menu-right">
					    	<li><a href="news.php">Person hat 1 neue Aktivität erstellt</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="news.php">Admin hat 1 neue Nachricht gesendet</a></li>
					    </ul>
					</div>
					<div class="headericon text col-sm-2 col-md-2">
						<p alt="Schriftgröße">aA</p>
					</div>
					<div class="headericon col-sm-2 col-md-2" 
						id="navProfileContainer">
						<img class="dropdown-toggle" 
							data-toggle="dropdown" 
							alt="Benutzer" id="logo_iw" 
							src="images/ic_person.png">
						<ul class="dropdown-menu dropdown-menu-right">
					    	<li><a href="profile.php">Profil</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="mygroup.php">Meine Gruppen</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="myactivity.php">Meine Aktivitäten</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="news.php">Nachrichten</a></li>
					    	<li role="separator" class="divider"></li>
					   		<li><a href="logout.php">Abmelden</a></li>
					    </ul>
					</div> <!-- /.headericon dropdown -->
				</div> <!-- /.row -->
			</div> <!-- /#col-md-3 -->
		</div> <!-- /.row -->
	</div> <!-- /.container-fluid -->