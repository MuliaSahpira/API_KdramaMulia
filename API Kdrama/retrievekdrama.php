<?php
require("koneksikdrama.php");
$perintah = "SELECT * FROM tbl_drakor";
$eksekusi = mysqli_query($connect, $perintah);

$cek = mysqli_affected_rows($connect);
if($cek>0){
    $response["kode"] = 1;
    $response["pesan"]= "Data Tersedia";
    $response["data"] = array();
    
    while($get = mysqli_fetch_object($eksekusi)){
        $var["id"] = $get->id;
        $var["gambar"] = $get->gambar;
        $var["judul"] = $get->judul;
        $var["hangul"] = $get->hangul;
        $var["sinopsis"] = $get->sinopsis;
        $var["rilis"] = $get->rilis;
        $var["genre"] = $get->genre;
        $var["rating"] = $get->rating;
        $var["episode"] = $get->episode;
        $var["pemeran"] = $get->pemeran;
        
        array_push($response["data"], $var);
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"]= "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($connect);