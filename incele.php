<?php
include "baglanti.php";   
$id = $_GET["id"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<title>İnceleme</title>
</head>

<body>
<?php include "menu.php"; ?>
<?php
$result2 = $mysqli->query("Select * from etiket where resimID=$id");
$result1 = $mysqli->query("Select * from fotograf where id=$id");
	$row1=mysqli_fetch_array($result1);
?>
<div class="container mt-3">
	<div class="row">
		<div class="col-md-6">
			<div class="card" style="width:700px">
				<?php echo '<img class="card-img-top" src="'.$row1["foto_url"].'" alt="Card image1">'; ?>   
				<div class="card-body">
					<h4 class="card-title"><?php echo "Başlık:"." ".$row1["baslik"]; ?></h4>
                    <p class="card-text"><?php echo "Etiketler:"." " ;
						   while($r = mysqli_fetch_array($result2))
							echo $r["etiket"]. ", ";?></p>
				</div></div>
		</div>
	</div>
</div>
</body>
</html>