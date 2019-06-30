<?php 
error_reporting(0);

include '../config/database.php';
     $sql = mysql_query("SELECT no_loket FROM `loket`
                                        WHERE nama_loket = 'PENGAMBILAN'
                                        AND aktif = '1'");
      $r    = mysql_fetch_array($sql);
      if($r == null){
          echo 'OFF';
      }else{
        echo "$r[no_loket]";
      }
?>