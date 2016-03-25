<div class="sidebar">
	<ul>
		<li class="nav-item <?php if($sel == "user-bestaetigen") echo "active" ?>"><a href="activate_user.php">Benutzer bestätigen</a></li>	
		<li class="nav-item <?php if($sel == "user-aendern") echo "active" ?>"><a href="user_list.php">Benutzerdaten ändern</a></li>			
		<li class="nav-item <?php if($sel == "gruppe-aendern") echo "active" ?>"><a href="group_list.php">Gruppen verwalten</a></li>	
		<li class="nav-item <?php if($sel == "orte-aendern") echo "active" ?>"><a href="place_list.php">Orte verwalten</a></li>
		<li class="nav-item <?php if($sel == "aktivitaeten-aendern") echo "active" ?>"><a href="activity_list.php">Aktivitäten verwalten</a></li>
		<li class="nav-item <?php if($sel == "interessen-aendern") echo "active" ?>"><a href="interest_list.php">Interessen verwalten</a></li>
	</ul>
</div>	