<?php
require("koneksikdrama.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $perintah = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek = mysqli_affected_rows($connect);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Login Berhasil";
        $response["dataPengguna"] = array();
    
        while($get = mysqli_fetch_object($eksekusi)){
            $var["username"] = $get->username;
            $var["nama"] = $get->nama;
            $var["email"] = $get->email;
            
            
            array_push($response["dataPengguna"], $var);
        }
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Ada Kesalahan. Gagal Login";
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($connect);