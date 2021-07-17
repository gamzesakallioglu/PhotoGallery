<meta charset="utf-8">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "baglanti.php";

if(isset($_GET["islem"])){
	$islem = $_GET["islem"];

if($islem=="kaydet"){
    $foto_isim = $_FILES["foto"]["name"];  
	$foto_turu = $_FILES["foto"]["type"];
	$foto_kaynak = $_FILES["foto"]["tmp_name"];
	//Fotonun yükleneceği yol
	$foto_hedef = "resimler/";
	
        $rasgele_isim = rand(1,10000);
	
        $foto_upload = move_uploaded_file($foto_kaynak,$foto_hedef.'/'.$rasgele_isim . "-" . $foto_isim);
	   
	    $foto_isim_yeni = "resimler/" .$rasgele_isim. "-".$foto_isim."";
	$baslik = $_POST["baslik"];
       $mysqli->query("INSERT INTO fotograf(foto_url,baslik) VALUES ('$foto_isim_yeni', '$baslik')");
	$resimID = mysqli_insert_id($mysqli);
	

	
	
	$etiket= $_POST["etiket"];
	$e = explode(",",$etiket);
	foreach($e as $etiketler){
		$etiketler = trim($etiketler);
		if(strlen($etiketler)>0){
			$mysqli->query("insert into etiket(resimID,etiket) Values($resimID,'$etiketler')");
		}
	
	}


   header("location:liste.php");

}}
?>