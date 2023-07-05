<?php
require("koneksikdrama.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $gambar = $_POST["gambar"];
    $judul = $_POST["judul"];
    $hangul = $_POST["hangul"];
    $sinopsis = $_POST["sinopsis"];
    $rilis = $_POST["rilis"];
    $genre = $_POST["genre"];
    $rating = $_POST["rating"];
    $episode = $_POST["episode"];
    $pemeran = $_POST["pemeran"];
    
    $perintah = "INSERT INTO tbl_drakor(gambar, judul, hangul, sinopsis, rilis, genre, rating, episode, pemeran) VALUES('$gambar', '$judul', '$hangul', '$sinopsis', '$rilis', '$genre', '$rating', '$episode', '$pemeran')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Menyimpan Data";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);