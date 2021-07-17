<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "baglanti.php";

?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
<title>Php</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include "menu.php";
	
		//**sayfa sayısını belirleme**
$sayfada = 8; // sayfada gösterilecek içerik miktarını belirtiyoruz.
 
$sorgu = $mysqli->query('SELECT COUNT(*) AS toplam FROM fotograf');
$sonuc = mysqli_fetch_array($sorgu);
$toplam_icerik = $sonuc['toplam'];
 
$toplam_sayfa = ceil($toplam_icerik / $sayfada);  //toplam sayfa sayısını bulduk, yukarı yuvarladık.
		//**içerik gösterme**
		// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
 
// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if($sayfa < 1) $sayfa = 1; 
 
// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
$limit = ($sayfa - 1) * $sayfada;
	
if(isset($_GET["islem"])){
	$islem=$_GET["islem"];
	if($islem=="arama"){
		$arama = $_POST['arama'];
	if($arama == null)
header("location:index.php");
     else{
     $result2 = $mysqli->query("SELECT * FROM etiket WHERE etiket LIKE '%".$arama."%'");?>
	<div class="container">
	<div class="row">
 <?php
 while($row2 = mysqli_fetch_array($result2)){ ?>
	 <div class="col-md-3">
    <?php $id2=$row2["resimID"];
	$result1=$mysqli->query("Select * from fotograf where id=$id2");
	 $row1=mysqli_fetch_array($result1);?>
 <div class="card" style="width:300px; height:350px">
 <?php echo '<img class="img-fluid" src="'.$row1['foto_url'].'" alt="Card image">';?>
  <div class="card-body">
	  <a href="incele.php?id=<?php echo $id2?>" class="btn btn-primary" role="button">İncele</a>
	 </div></div></div>
<?php 
}?> </div></div>
 <?php }}}
	
		else{
		//limitten başlayarak sayfada kadar göster.
$result1 = $mysqli->query('SELECT * FROM fotograf order by id desc LIMIT ' . $limit . ', ' .$sayfada ); ?>
<div class="container">
<div class="row">
<?php
while($row1 = mysqli_fetch_array($result1)) { ?>
<div class="col-md-3">  
<?php   $id=$row1["id"]; ?>  
		<div class="card" style="width:300px; height:350px">
 <?php echo '<img class="img-fluid" src="'.$row1['foto_url'].'" alt="Card image" height="300" width="250">'; ?>
  <div class="card-body">
    <a href="incele.php?id=<?php echo $id?>" class="btn btn-primary" role="button">İncele</a>
			</div></div></div>
<?php } ?>
</div></div>
<?php
      
		for($s = 1; $s <= $toplam_sayfa; $s++) {
   if($sayfa == $s) { // eğer bulunduğumuz sayfa ise link yapma.
      echo $s . ' '; 
   } else {
      echo '<a href="?sayfa=' . $s . '">' . $s. " " . '</a>';
 }}} 
		?></div> 
		</body>
		</html>