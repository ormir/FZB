<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>		
		function changeBackgroundClass(id){
			var entry = ".entry-"+id;			
			if($(entry).hasClass("selected-to-activate")){
				$(entry).removeClass('selected-to-activate');
			} else {
				$(entry).addClass('selected-to-activate');
			}
		}
	</script>
</head>
<body>
	<div class="site-wrap">
		<div class="sidebar">
			<ul>
				<li class="nav-item"><a href="#">Personen bestätigen</a></li>				
			</ul>
		</div>		
		<div class="main-content">
			<form action="update_data.php">
				<input type="submit" value="Änderungen speichern!" class="submit">
				<table>
					<tr>
						<td>VN</td>
						<td>NN</td>
						<td>User</td>
						<td>E-Mail</td>
						<td>Tel Nr.</td>
						<td>Straße</td>
						<td>Ort</td>
						<td>PLZ</td>
						<td>Geburtstag</td>
						<td>Aktivieren</td>
					</tr>
					<!-- 
					entry-1 = entry-(user-id)
					-->
					<tr class="entry-1"> 
						<td>Maria</td>
						<td>Cole</td>
						<td>mariacole</td>
						<td>mariacole@inbound.plus</td>
						<td>+43 89 1234567</td>
						<td>Waldstrasse 45</td>
						<td>Feldbach</td>
						<td>5221 </td>
						<td>01.12.3010</td>
						<!-- activate-1 = activate-(user-id) -->
						<!-- changeBackgroundClass(user-id) -->
						<td><input type="checkbox" onchange="changeBackgroundClass(1);" name="activate-1"></td>
					</tr>
				</table>
			</form>	
		</div>		
	</div>
</body>
</html>