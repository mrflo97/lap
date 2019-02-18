<html>
	<head>
		<title>Kundensuche</title>
	</head>
	<body>
		<h3>Suche nach Kundennummer</h3>
		<form action="./anzeige.php">
			Kundennummer:
			<input type="number" name="kunde_id" id="input">
			<input type="submit" value="Suchen">
			<input type="button" value="Leeren" onclick="javascript:document.getElementById('input').value = ''">
		</form>
	</body>
</html>