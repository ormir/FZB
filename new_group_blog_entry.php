<?php 
	include("common.inc.php");
	$error = "";
	$text = "";
	$headline = "";
	if(isset($_GET["i"])){
		$id = cleanParam($_GET["i"]);
		$sql = "SELECT * FROM `group` WHERE id = '".$id."'";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			$groupResult = $result->fetch_assoc();
		}

		if($groupResult["fk-admin-id"] == $_SESSION["user_id"]){
			$allowed = true;
			if(isset($_POST["create"])) {
				$headline = cleanParam($_POST["headline"]);
				$text = cleanParam($_POST["text"]);
				if($headline == "" || $text == "") {
					$error = "Bitte alle Felder ausfüllen";
				} else {
					$sql = "INSERT INTO `blog` (headline, content, `fk-group-id`) 
							VALUES ('".$headline."','".$text."','".$id."')";
					$mysqli->query($sql);
					header("location:groupdescription.php?i=$id");
				}
			}
		} else {
			$allowed = false;
		}

	}	
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
	<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
		tinymce.init({
			selector: '#blog-text'
		});
		console.log("<?=$sql ?>");
	</script>
</head>
<body>

<div id="navbar">
	<?php include("header.inc.php"); ?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
<div class="row">
	<div class="col-xs-8 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8 content">
		<?php echo $error;?>
		<div class="row">
			<?php if(isset($_GET["i"]) && $allowed){ ?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10">				
					<form method="post" action="new_group_blog_entry.php?i=<?=$_GET['i']?>" class="new-blog-form"> 
						Headline <br>
						<input type="text" name="headline" class="blog-input" value="<?=$headline?>"><br>

						Fließtext <br>
						<textarea id="blog-text" name="text"><?=$text ?></textarea>
						<input type="submit" name="create">
					</form>
				</div>
			<?php 
			// end of if(isset($_GET["i"])) 
			}
			else if(!$allowed){ ?>
				<h1>Administratorrecht der Gruppe benötigt, um Blogeintrag zu erstellen.</h1>
			<?php }
			else { ?>
				<h1>Keine Gruppe gefunden!</h1>
			<?php }
			?>
		</div>
	</div>
	<div class="col-md-3"> </div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>