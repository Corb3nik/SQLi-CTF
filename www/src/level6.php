<?php 
if (isset($_GET['source'])) {
    die(highlight_file(__FILE__));
}

require("conf/level6.conf.php"); 
error_reporting(0);


if (isset($_GET['q'])) {
	// Ban space character
	if (strpos($_GET['q'], "'") !== false) die("Hacker detected"); 
	if (strpos($_GET['q'], '"') !== false) die("Hacker detected"); 
}


?>
<!DOCTYPE html>
<html>
 <head>
  <title>Gogol Search</title>
 <link rel="stylesheet" href="http://www.goglogo.com/include/goglogo.css" type="text/css" />
  </head>

 <body style="margin:0;padding:0;">
 <div id="overlay_bg" style="display:none; background-color:#000000; position:fixed; z-index:1001"></div>
    <br/><br/><br/><br/>
    <div class="content-area">
        <div class="logo">
	<img src="http://funnylogo.info/logo/Google/White/Gogol.aspx">
        </div>
        <div class="searchBox">
            <table cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td>
                    <form name="frm" id="frm" method="GET">
                    <input type="text" name="q" size="40" value=""/>
                    <input type="submit"/>
                    <br /><br />
                    </form>
                </td>
            </tr>
            </table>
            <br/>
        </div>

	<?php
	if (isset($_GET['q'])) {
		
		$query = "SELECT * FROM search_engine WHERE title LIKE '" . $_GET['q'].  "' OR description LIKE '" . $_GET['q'] .  "' OR link LIKE '" . $_GET['q'] . "';";
		$result = $conn->query($query);

		echo  "<h2>Number of results for '". htmlspecialchars($_GET['q']) . "' : " . $result->num_rows . "</h2>";
	?>
	<?php
		if (isset($result) && $result->num_rows > 0) {
			echo "<hr/>";
			echo "<br/>";

			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<div>";
				echo "<a href='" . $row['link'] . "'><h2>" . htmlspecialchars($row['title']) . "</h2></a>";
				echo "<h3>" . htmlspecialchars($row['link']) . "</h3>";
				echo "<p>" . htmlspecialchars($row['description']) . "</p>";
			}
		}
	?>

    </div>
</div>
 </body>
</html>
<?php } ?>
