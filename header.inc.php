
	<div class="container-fluid">
		<div class="row">
			<a href="index.php">
				<div class="headericon col-sm-1 col-md-1">
					<img alt="Integration Wien" id="logo_iw" src="images/ic_integration_wien.png">
				</div>
			</a> <!-- /.headericon col-md-1 -->
			<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-2" id="search">
				<div class="input-group">
					<form class="input-group-btn" method="get" action="search.php">
						<input style="width: 80%" type="text" name="eingabe" class="form-control searchfield" id="stext" placeholder="Suche">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><img src="images/ic_focus.png" alt="Suche"></button>
						</span>
					</form>
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
					<div id="divtextsize" class="headericon text col-sm-2 col-md-2">
						<img src="images/aa1.png" width="42" height="42">
					</div>
					<div class="headericon col-sm-2 col-md-2" 
						id="navProfileContainer">
						<img class="dropdown-toggle" 
							data-toggle="dropdown" 
							alt="Benutzer" id="logo_iw" 
							src="images/ic_person.png">
						<ul class="dropdown-menu dropdown-menu-right">
					    	<li><a href="profile.php">Mein Profil</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="mygroup.php">Meine Gruppen</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="myactivity.php">Meine Aktivitäten</a></li>
					    	<li role="separator" class="divider"></li>					    	
					    	<li><a href="news.php">Meine Nachrichten</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="myplace.php">Meine Orte</a></li>
					    	<?php 
					    	if($_SESSION["admin"] == true){ ?>
						    	<li role="separator" class="divider"></li>
						   		<li><a href="admin-view.php">Zum Admin</a></li>
					   		<?php
					   		}
						   	?>
					    	<li role="separator" class="divider"></li>
					   		<li><a href="logout.php">Abmelden</a></li>					   		
					    </ul>
					</div> <!-- /.headericon dropdown -->
				</div> <!-- /.row -->
			</div> <!-- /#col-md-3 -->
		</div> <!-- /.row -->
	</div> <!-- /.container-fluid -->
	<script>
	var textSize = $("#divtextsize");
	var large=false;
		$(document).ready(function() {
			
			textSize.click(function(){	
				if(large){
					$("body").attr("style","font-size:14px;");
					large=false;
				}else
				{

					$("body").attr("style","font-size:17px;");
					large=true;
				}
			});
			
		});
	</script>