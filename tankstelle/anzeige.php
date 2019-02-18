<?php
require("dbconnection.php");
echo "
<html>
	<head>
		<title>Kundeninfo</title>
		<link href='style.css' rel='stylesheet'/>
	</head>
	<body>
		<h1>Suchergebnis</h3>
	";
	try {
		if(!isset($_GET['kunde_id'])) {
			throw new Exception("Keine id angegeben.");
		}
		$pdo = connect();
		
		$kunde = getKunde($_GET['kunde_id'], $pdo);
		echo "
		<table style='border:5px'>";
			foreach($kunde as $key => $value) {
				if(!is_numeric($key)) {
					echo "
					<tr>
						<td align=center><b>$key:</b></td><td>$value</td>
					</tr>";					
				}
			}
		echo "
		</table>";
	}
	catch (\PDOException $e){
		echo "Es ist ein Fehler beim kommunizieren mit der Datenbank aufgetreten.";
		echo $e->getMessage();
	}
	catch(\Exception $e) {
		echo $e->getMessage();
	}
	echo"
	<body>
</html>"
?>