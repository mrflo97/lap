<?php
require("dbconnection.php");
?>
<html>
	<head>
		<title>Kundensuche</title>
		<link href='style.css' rel='stylesheet'
	</head>
	<body>
		<h1>Suche</h1>
		<form>
			Kunden nummer: 
			<input type='number' name='kunde_id' id='kunde_id_input' value='<?php
				if(isset($_GET['kunde_id'])) {
					echo $_GET['kunde_id'];
				}
			?>'>
			<input type='Submit' value='Suchen'/>
			<input type='button' value='Leeren' onclick="javascript:document.getElementById('kunde_id_input').value = ''">
		</form>
		<hr><?php
			if(isset($_GET["kunde_id"]) && !empty($_GET["kunde_id"])) {
				echo "<h1>Ergebnis</h1>";
				try {
					$pdo = connect();
					$kundeDbo = getKunde($_GET['kunde_id'], $pdo);	
					echo"<table>";
					foreach($kundeDbo as $key => $value) {
						if(!is_numeric($key)) {
							echo "<tr><td align=center><b>$key:</b></td><td>$value</td></tr>";							
						}
					}
					echo"</table>";
				}
				catch (\PDOException $e) {
					echo "There has been an error connecting to the database: $e->getMessage()";				
				}
				catch (\Exception $e) {
					echo $e->getMessage();
				}
			}
		?>
	</body>
</html>