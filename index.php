<?php include("common.inc.php"); ?>

<!DOCTYPE html>
<html class="index">
<head>
	<?php include("html.head.inc.php"); ?>
	<script>
	$(document).ready(function(){
		var currOpen = "";
		$(".square").click(function(){
			var id = $(this).attr("data-id");
			var toOpen = ".inner-carousell-"+id;			
			$(".inner-carousell").slideUp(400);
			// $(".inner-carousell .entry-img").hide(300)
			if(currOpen == toOpen) {
				currOpen = "";
				return false;
			}
			$(toOpen).slideDown(400,function(){
				// $(toOpen+" .entry-img").show(300);
				currOpen = toOpen;
			});
			return false;
		});
	});
	</script>
</head>
<body>

<div id="navbar">
	<?php include("header.inc.php"); ?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
	<div class="row">
		<div class="col-xs-4 col-sm-2 col-md-2">
		</div>
		<div class="col-xs-14 col-sm-8 col-md-8 content index">
			<div class="row">
				<div class="col-xs-18 col-sm-15 col-md-12" id="map"></div>
				<!-- Maps script -->
				<script src="js/maps.js"></script>
				<!-- Google Maps Script -->
    			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>
			</div>
	
			<div class="row">								
				<a href="myactivity.php" class="circle">
					<img src="images/kite.png" alt="">
					<p>Aktivität</p>
				</a>			
		
				<a href="mygroup.php" class="circle">
					<img src="images/group.png" alt="">
					<p>Gruppe</p>
				</a>			
		
				<a href="myplace.php" class="circle">
					<img src="images/place.png" alt="">
					<p>Orte</p>
				</a>			
		
				<a href="newactivity.php" class="circle">
					<img src="images/plus.png" alt="">
					<p>Erstelle</p>
				</a>			
			</div>
		
			<?php
			// Get user interests
			$user_interest_sql = "SELECT `fk-interest-id`, name as iname
				FROM `user-interest` 
					join interest on interest.id = `fk-interest-id`
				where `fk-user-id` = ".$_SESSION['user_id'];
			$result = $mysqli->query($user_interest_sql);

			$int_act = array(); // interest with activity

			while($row = $result->fetch_assoc()){
			// echo $row['fk-interest-id']." ".$row['iname'];
				$mIntArrsql = "SELECT  
								`name` ,  
								date(`date-start`) as date, 
								time(`date-start`) as time, 
								`fk-activity-id`,
								`fk-interest-id` 
						FROM  `activity-interest` 
						JOIN activity ON activity.id =  `activity-interest`.`fk-activity-id` 
						WHERE  `fk-interest-id` = ".$row['fk-interest-id'];
				$mResult = $mysqli->query($mIntArrsql);
				if($mResult->num_rows > 0) {
					while($mRow = $mResult->fetch_assoc()){
						$int_act[$row['iname']][$mRow['name']]['id'] = $mRow['fk-activity-id'];
						$int_act[$row['iname']][$mRow['name']]['date'] = $mRow['date'];
						$int_act[$row['iname']][$mRow['name']]['time'] = $mRow['time'];
						$int_act[$row['iname']]['id'] = $mRow['fk-interest-id'];
						$int_act[$row['iname']]['img'] = "";
						}
				}
			}
			?>


			<div class="carousell-navigation">
				<?php 
				foreach ($int_act as $key => $value){ ?>
					<a class="square" data-id="<?php echo $value['id'];?>">
						<img src="images/placeholder.png" alt="">
						<p><?php echo $key;?></p>
					</a>
				<?php }?>
			</div>
			<div class="carousell">
				<?php foreach ($int_act as $key => $value){ ?>
					<div class="inner-carousell inner-carousell-<?php echo $value['id'];?>">
						<h1><?php echo $key;?></h1>
						<img src="images/coffee.png" class="entry-img" alt="">
							<?php foreach ($value as $akey => $avalue){ 
								if($akey != "id" && $akey != "img") {?>
									<a href="activitydescription.php?i=<?php echo $avalue['id'];?>" class="activity-wrap">
										<span class="entry-title"><?php echo $akey?></span>
										<span class="entry-time"><?php echo $avalue['time'];?></span>
										<span class="entry-date"><?php echo $avalue['date'];?></span>
									</a>
						  <?php } 
							} ?>			
					</div>
				<?php } ?>
			</div>
			<div class="col-xs-8 col-sm-4 col-md-2"></div>
		</div>
	</div>
</div>

	<footer>
		<!-- Aytac JS-->
		<script src="js/index.js"></script>
		<script src="js/function.js"></script>
	</footer>
</body>
</html>