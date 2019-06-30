<?php 
error_reporting(0);
include 'config/database.php';
 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->

<head>
<meta charset="utf-8">
<title>Poltekpel Sumbar - Antrian</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="webroot/css/custom_css/mylib/bootstrap.min.css" rel="stylesheet">
<!-- <link href="webroot/css/lib/bootstrap-responsive.css" rel="stylesheet"> -->
<!-- <link href="webroot/css/boo-extension.css" rel="stylesheet"> -->
<!-- <link href="webroot/css/boo_1.css" rel="stylesheet"> -->
<!-- <link href="webroot/css/boo-coloring.css" rel="stylesheet"> -->
<!-- <link href="webroot/css/boo-utility.css" rel="stylesheet"> -->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="webroot/plugins/selectivizr/selectivizr-min.js"></script>
    <script src="webroot/plugins/flot/excanvas.min.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="webroot/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="webroot/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="webroot/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="webroot/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="webroot/ico/apple-touch-icon-57-precomposed.png">
<style> 
.color { color:white; }  
.blink { padding-top:20px; color:white; -webkit-animation: blink .75s linear infinite; -moz-animation: blink .75s linear infinite; -ms-animation: blink .75s linear infinite; -o-animation: blink .75s linear infinite; animation: blink .75s linear infinite; } @-webkit-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-moz-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-ms-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @-o-keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } @keyframes blink { 0% { opacity: 1; } 50% { opacity: 1; } 50.01% { opacity: 0; } 100% { opacity: 0; } } 
</style>
<script src="webroot/js/lib/jquery.js"></script>            
<!-- <link rel="stylesheet" href="compiled/flipclock.css"> -->
<link href="webroot/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="outer container">
        <div class="row">
            <div class="column list col-md-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="left box col-md-8">
                            <div class="head">Nomor Antrian</div>
                            <div class="content" id="responsecontainer"></div>
                        </div>
                        <div class="right box col-md-4">
                            <div class="head">LOKET</div>
                            <div class="content" id="loket_transaksi"></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="left box col-md-8">
                            <div class="head">Nomor Antrian</div>
                            <div class="content" id="respon_administrasi"></div>
                        </div>
                        <div class="right box col-md-4">
                            <div class="head">LOKET</div>
                            <div class="content" id="loket_administrasi"></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="left box col-md-8">
                            <div class="head">Nomor Antrian</div>
                            <div class="content" id="respon_pengambilan"></div>
                        </div>
                        <div class="right box col-md-4">
                            <div class="head">LOKET</div>
                            <div class="content" id="loket_pengambilan"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column col-md-7">
                <div class="header">
                    <h2>Antrian Poltekpel Sumbar</h2>
                </div>
                <div id='media-player' class="video-section col-md-12">
                <?php
                $detail = mysqli_query($connect,"SELECT * FROM video WHERE id='1'");
                $r    = mysqli_fetch_array($detail); ?>
                    <video id='media-video' class="col-md-12" controls autoplay loop>
                        <source src='video/<?php echo "$r[nama_file]";?>' type='video/mp4'>
                    </video>
                </div>
                <div class="static text-center"><h4>.:: Budayakan Antri Untuk Kenyamanan Bersama, Terimakasih Atas Kunjungan Anda ::. </h4></div>
            </div>
        </div>
        <div class="row">
            <div class="running_text">
                <marquee direction='left' scrollamount='5'>
                    <?php 
                        $sql = mysqli_query($connect, "SELECT  id, isi_text FROM running_text");
                            while ($r=mysqli_fetch_array($sql)){
                                echo $r[isi_text];
                            }
                    ?>
                </marquee>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#responsecontainer").load("respon/respon_transaksi.php");
            var refreshId = setInterval(function() {
                $("#responsecontainer").load('respon/respon_transaksi.php');
            }, 3000);
            $.ajaxSetup({ cache: false });
            $("#loket_transaksi").load("respon/loket_transaksi.php");
            var refreshId = setInterval(function() {
              $("#loket_transaksi").load('respon/loket_transaksi.php');
            }, 3000);
            $.ajaxSetup({ cache: false });

            $("#respon_administrasi").load("respon/respon_administrasi.php");
            var refreshId = setInterval(function() {
                $("#respon_administrasi").load('respon/respon_administrasi.php');
            }, 3000);
            $.ajaxSetup({ cache: false });
            $("#loket_administrasi").load("respon/loket_administrasi.php");
            var refreshId = setInterval(function() {
              $("#loket_administrasi").load('respon/loket_administrasi.php');
            }, 3000);
            $.ajaxSetup({ cache: false })

            $("#respon_pengambilan").load("respon/respon_pengambilan.php");
            var refreshId = setInterval(function() {
                $("#respon_pengambilan").load('respon/respon_pengambilan.php');
            }, 3000);
            $.ajaxSetup({ cache: false });
            $("#loket_pengambilan").load("respon/loket_pengambilan.php");
            var refreshId = setInterval(function() {
              $("#loket_pengambilan").load('respon/loket_pengambilan.php');
            }, 3000);
            $.ajaxSetup({ cache: false })
        });
    </script>
</body>
</html>
