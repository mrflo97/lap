<?php
	
function connect() {
	$host 	= 'localhost';
	$db		= 'tankstelle';
	$user 	= 'root';
	$pw		= '';
	
	$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
	$pdo = new PDO($dsn, $user, $pw);
	return $pdo;
}
	
function getKunde($id, $pdo) {
	$stmtKunde = $pdo->prepare("select kunde.kunde_id as 'Kunden ID', kunde.vorname as Vorname, kunde.nachname as Nachname, 
	kunde.geburtsdatum as Geburtsdatum, kunde.strasse as Strasse, kunde.plz as PLZ, kunde.ort as Ort, kunde.telefon as Telefon, 
	SUM(verbrauch.menge) as Gesamtverbrauch, SUM(verbrauch.preis) as Gesamtpreis
from kunde
join verbrauch on verbrauch.kunde_id = kunde.kunde_id
where kunde.kunde_id = ?;");
	$stmtKunde->execute([$id]);
	$kundeDbo = $stmtKunde->fetch();
	//if($stmtKunde->rowCount() <= 1) {
	if ($kundeDbo[0] == NULL) {
		throw new Exception("Der Kunde wurde in der Datenbank nicht gefunden.");
	}
	return $kundeDbo;
}
?>