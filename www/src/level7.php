<?php

	require("conf/level7.conf.php");
?>
<html>
	<style>
		body { background-color: black; color: red; text-align: center; }
		.centered {
		  position: fixed;
		  top: 50%;
		  left: 50%;
		  /* bring your own prefixes */
		  transform: translate(-50%, -50%);
		}
	</style>
	<body>
		<div class="centered">
			<?php if (isset($_GET['id'])) { 
				$filter = array('union', 'select', 'or', 'load_file', 'from', 'where');

				// Remove all banned characters
				foreach ($filter as $banned) {
					$_GET['id'] = preg_replace('/' . $banned . '/i', '', $_GET['id']);
				}

				if (strpos($_GET['id'], " ") !== false) die("Hacker detected");		

				$query = "SELECT text from motivation WHERE id = " . $_GET['id'] . ";"; 
				$results = $conn->query($query);
			?>
			<h1>
				<?php echo $results->fetch_assoc()['text']; ?>
			</h1>
			<?php } ?>
			<button onclick="spawn_motivation()">Motivate me</button>
		</div>

		<script>
			var spawn_motivation = function() {
				var id = Math.floor(Math.random() * 6);
				document.location = document.location.origin + "/level7.php?id=" + id;
			}
		</script>
	</body>
</html>
