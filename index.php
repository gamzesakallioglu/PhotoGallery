<?php include "baglanti.php" ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fotoğraflar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<div class= "container">
<?php   include "menu.php"?>
<div class="row">
<div class="col-md-9">
		<form name="fotoform" id="fotoform" action="kaydet.php?islem=kaydet" method="post" enctype="multipart/form-data">
		<div class="card mt-3">
		<div class="card-body">
		<div class="form-group row">
		    <label class=col-md-5 for="foto"><b>Eklemek istediğiniz fotoğrafı seçiniz:</b></label>
	    <div class="col-md-7"><input type="file" name="foto" id="foto"></div></div>
	    <div class="form-group row">
	     <label class=col-md-5 for="baslik">Başlık:</label>
		<div class="col-md-7"><input type="text" name=baslik id=baslik></div></div>
		<div class="form-group row">
		      <label class=col-md-5 for="etiket">Etiketler:</label>
	    <div class="col-md-7"><textarea name=etiket id=etiket></textarea><span style="font-size:12px; color:red;">Lütfen etiketlerin arasına virgül koyunuz.</span></div></div>

	<div class="card-footer"><button type="submit" class="btn btn-primary">Ekle</button></div>	
		
</div></div></form></div></div></div>
</body>
</html>