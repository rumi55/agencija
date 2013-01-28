<?php

include_once 'connection.php';


function dodajPonudu($vlasnik, $lokacija_id, $ulica_i_broj, $telefon, $cena, $sprat, $kvadratura, $opis, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja)
{
    global $conn;
    

    $sql = "INSERT INTO ponude (id, vlasnik, lokacija_id, ulica_i_broj, telefon, cena, sprat, kvadratura, opis, t_grejanje, t_kablovska, t_tv, t_klima, t_internet, t_telefon, t_frizider, t_sporet, t_vesmasina, t_kuhinjskielementi, t_plakari, t_lift, t_bazen, t_garaza, t_parking, t_dvoriste, t_potkrovlje, t_terasa, t_novogradnja, t_renovirano, t_lux, t_penthaus, t_salonski, t_lodja)
            VALUES              ('', :vlasnik, :lokacija_id, :ulica_i_broj, :telefon, :cena, :sprat, :kvadratura, :opis, :grejanje, :kablovska, :tv, :klima, :internet, :ima_telefon, :frizider, :sporet, :vesmasina, :kuhinjskielementi, :plakari, :lift, :bazen, :garaza, :parking, :dvoriste, :potkrovlje, :terasa, :novogradnja, :renovirano, :lux, :penthaus, :salonski, :lodja)";
    $query = $conn->prepare($sql);
    $query->execute(array(
	':vlasnik' => $vlasnik,
        ':lokacija_id' => $lokacija_id,
        ':ulica_i_broj' => $ulica_i_broj,
        ':telefon' => $telefon,
        ':cena' => $cena,
        ':sprat' => $sprat,
        ':kvadratura' => $kvadratura,
        ':opis' => $opis,
        ':grejanje' => $grejanje,
        ':kablovska' => $kablovska,
        ':tv' => $tv,
        ':klima' => $klima,
        ':internet' => $internet,
        ':ima_telefon' => $ima_telefon,
        ':frizider' => $frizider,
        ':sporet' => $sporet,
        ':vesmasina' => $vesmasina,
        ':kuhinjskielementi' => $kuhinjskielementi,
        ':plakari' => $plakari,
        ':lift' => $lift,
        ':bazen' => $bazen,
        ':garaza' => $garaza,
        ':parking' => $parking,
        ':dvoriste' => $dvoriste,
        ':potkrovlje' => $potkrovlje,
        ':terasa' => $terasa,
        ':novogradnja' => $novogradnja,
        ':renovirano' => $renovirano,
        ':lux' => $lux,
        ':penthaus' => $penthaus,
        ':salonski' => $salonski,
        ':lodja' => $lodja
        )); 
}

function prikaziSveponude($start, $limit){
    global $conn;

    $sql = "SELECT * FROM ponude as ds 
			INNER JOIN lokacija as l 
			ON ds.lokacija_id = l.id 
			LIMIT $start, $limit";
	$query = $conn->prepare($sql);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_BOTH);
    
}

function prikaziPonudu($id){
    global $conn;

    $sql = "SELECT * FROM ponude as ds 
			INNER JOIN lokacija as l 
			ON ds.lokacija_id = l.id 
			WHERE ds.id = :id LIMIT 1";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    return $query->fetch();
    
}

function izbrisiPonudu($id){
    global $conn;

    $sql = "DELETE FROM ponude
			WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
		':id' => $id
		));
    
}

function ukupanBrojPonuda(){
    global $conn;

    $sql = "SELECT COUNT(*) as broj FROM ponude";
    $query = $conn->prepare($sql);
    $query->execute();
	return $query->fetch();
    
}

function izmeniPonudu($id, $vlasnik, $ulica_i_broj, $telefon, $cena, $sprat, $kvadratura, $opis, $grejanje, $kablovska, $tv, $klima, $internet, $ima_telefon, $frizider, $sporet, $vesmasina, $kuhinjskielementi, $plakari, $lift, $bazen, $garaza, $parking, $dvoriste, $potkrovlje, $terasa, $novogradnja, $renovirano, $lux, $penthaus, $salonski, $lodja)
{
    global $conn;
    

    $sql = "UPDATE ponude SET vlasnik = :vlasnik, ulica_i_broj = :ulica_i_broj, telefon = :telefon, cena = :cena, sprat = :sprat, kvadratura = :kvadratura, opis = :opis, t_grejanje = :grejanje, t_kablovska = :kablovska, t_tv = :tv, t_klima = :klima, t_internet = :internet, t_telefon = :ima_telefon, t_frizider = :frizider, t_sporet = :sporet, t_vesmasina = :vesmasina, t_kuhinjskielementi = :kuhinjskielementi, t_plakari = :plakari, t_lift = :lift, t_bazen = :bazen, t_garaza = :garaza, t_parking = :parking, t_dvoriste = :dvoriste, t_potkrovlje = :potkrovlje, t_terasa = :terasa, t_novogradnja = :novogradnja, t_renovirano = :renovirano, t_lux = :lux, t_penthaus = :penthaus, t_salonski = :salonski, t_lodja = :lodja WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':id' => $id,
	':vlasnik' => $vlasnik,
        ':ulica_i_broj' => $ulica_i_broj,
        ':telefon' => $telefon,
        ':cena' => $cena,
        ':sprat' => $sprat,
        ':kvadratura' => $kvadratura,
        ':opis' => $opis,
        ':grejanje' => $grejanje,
        ':kablovska' => $kablovska,
        ':tv' => $tv,
        ':klima' => $klima,
        ':internet' => $internet,
        ':ima_telefon' => $ima_telefon,
        ':frizider' => $frizider,
        ':sporet' => $sporet,
        ':vesmasina' => $vesmasina,
        ':kuhinjskielementi' => $kuhinjskielementi,
        ':plakari' => $plakari,
        ':lift' => $lift,
        ':bazen' => $bazen,
        ':garaza' => $garaza,
        ':parking' => $parking,
        ':dvoriste' => $dvoriste,
        ':potkrovlje' => $potkrovlje,
        ':terasa' => $terasa,
        ':novogradnja' => $novogradnja,
        ':renovirano' => $renovirano,
        ':lux' => $lux,
        ':penthaus' => $penthaus,
        ':salonski' => $salonski,
        ':lodja' => $lodja
        )); 
}