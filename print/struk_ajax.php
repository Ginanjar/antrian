
<?php 
 session_start();
error_reporting(0);
include "timeout.php";
if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
   // include('headerSystem.php'); 
?>
<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Poltekpel Sumbar
</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
                <script src="jquery.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<script src="https://cdn.jsdelivr.net/npm/recta/dist/recta.js"></script>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">

						<h1>Poltekpel Sumatera Barat </h1>
						<p>Silahkan Pilih Menu Antrian Dan Ambil Nomor Antrian</p>
						<nav>
							<ul>
								<li><a id="pas" href="#" class="fa fa-font"><span>Twitter</span>PNBP</a></li>
								<li></li>
								<li><a id="administrasi" href="#" class="fa fa-bold"><span>Email</span>DPM</a></li>
								<li></li>
								<li><a id="pengambilan" href="#" class="fa fa-book"><span>Email</span>PENGAMBILAN</a></li>
							</ul>
						</nav><br>
                                                <span class="counter" ></span>
                                                <?php 
                                                session_start();
                                                //echo "$_SESSION[antrian]";?>
					</header>

				<!-- Footer -->
					<footer id="footer">
						
					</footer>
				
			</div>
		</div>
            <script>
$(document).ready(function () { 
   $('#pas').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        next();
   });
   function next() {
    // AJAX Call Below
    // rest of your code
    $.ajax({
         type: "POST",
    	 //dataType: 'json', 
         url: "print_transaksi.php",
         success: function (response) {
             $(".counter").load("respon/respon_transaksi.php");
             var printer = new Recta('1114058730', '1811');
             printer.open().then(function () {
		      printer.align('center')
		        .mode()
		        .text('Anda Antrian Ke')
		        .bold(true)
		        .mode('B',true,true,true,false)
		        .text("A"+response)
		        .mode()
		        .text()
		        .text('<?php echo date("d/m/Y H:i:s");?>')
		        .text('Poltekpel Sumatera Barat')
		        .bold(false)
		        .feed()
		        .cut(true,0)
		        .print()
		    });
         }
     });
    }
    });


   $('#administrasi').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        back();
   });
   function back() {
	// AJAX Call Below
	// rest of your code
	$.ajax({
	     type: "POST",
	     url: "print_administrasi.php",
	     success: function (response) {
	         $(".counter").load("respon/respon_administrasi.php");
	         //alert ("successfully loaded");
	     }    
	 });
	}

	$('#pengambilan').click(function(e){
	    e.preventDefault();
	    e.stopPropagation();
	    ambil();
	});

	function ambil() {
	// AJAX Call Below
	// rest of your code
	$.ajax({
	     type: "POST",
	     url: "print_pengambilan.php",
	     success: function (response) {
	         $(".counter").load("respon/respon_pengambilan.php");
	         //alert ("successfully loaded");
	     }    
	 });
	}

</script>
	</body>
</html>
<?php }
}
?>