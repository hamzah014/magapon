<?php
include "mysqli_connect_MAGAPON.php";
require 'vendor/autoload.php';

use Dompdf\Dompdf;


$sql = "SELECT user_part_id, fish_weight FROM ranking ORDER BY fish_weight DESC";
$result = mysqli_query($conn, $sql);


$dompdf = new Dompdf();
ob_start();
require('trypdf.php');
$html = ob_get_contents();
ob_get_clean();

            
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','portrait');
            $dompdf->render();
            $dompdf->stream();
?>