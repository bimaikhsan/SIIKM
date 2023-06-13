<?php if($_SESSION['USER']['level'] != 'mahasiswa'){
  session_start();
  session_destroy();
  ?> 
  <script>alert("Sudah Login, Silahkan Logout Terlebih dahulu!");window.location="./index.php?page=login"</script>
<?php }
$contact = $fungsi->tampil_data_id('contact','id',1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"></meta>
	<meta content="width=device-width, initial-scale=1.0" name="viewport"></meta>
	<title>DAFTAR INFORMASI KEGIATAN MAHASISWA (IKM) </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="./assets/style3.css" rel="stylesheet"></link>
</head>
<body>
<div class="navbar">
	<ul>
		<li style="float:left"><a href="./index.php">SISTEM INFORMASI MAHASISWA</a></li>
		<li style="float:right"><a style="float:right" class="active" href="./index.php?page=contact">Contact </a></li>
		<li style="float:right"><a style="float:right" href="./index.php?page=account">Account </a></li>
		<li style="float:right">
		<div class="dropdown">
			<button class="dropbtn" onclick="myFunction()">Informasi <i class="fa fa-caret-down"></i></button>
			<div class="dropdown-content" id="myDropdown">
			<?php 
				$kategori = $fungsi->tampil('kategori');
				foreach($kategori as $val){
			?>
				<a href="./index.php?page=informasi&data=<?=$val['nama']?>"><?=$val['nama']?></a>
			<?php 
				}
			?>
			</div>
		</li>
		<li style="float:right"><a style="float:right" href="./index.php">Beranda</a></li>
	</div> 
	</ul>
</div>

    <div class="dasboard">
		<h1>Contact</h1>
		<br>
        <?=$contact['data']?>
		<br>
    </div>
    <script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>