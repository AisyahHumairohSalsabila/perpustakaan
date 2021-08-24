<?php 
//connect to database

$conn = mysqli_connect("localhost", "root", "", "db_perpus");

function query($query) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data){

    global $conn;
    $kode   = htmlspecialchars($data["kode"]);
    $judul  = htmlspecialchars($data["judul"]);
    $pengarang   = htmlspecialchars($data["pengarang"]);
    $kelas = htmlspecialchars($data["kelas"]);
    
    $sampul = upload();
    if(!$sampul){
        return false;
    }

    
     $query = "INSERT INTO data_buku
                VALUES
               ('$kode', '$judul', '$pengarang', '$kelas', '$sampul')
            ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
   
}

function upload(){
   
    $namaFile = $_FILES['sampul']['name'];
    $size = $_FILES['sampul']['size'];
    $error = $_FILES['sampul']['error'];
    $tmpName = $_FILES['sampul']['tmp_name'];

    
    if ($error === 4) {
        echo "<script>
                alert('Pilih sampul terlebih dahulu');
              </script>";
        return false;
    }

   
    $ekstensi = ['jpg', 'jpeg','png'];
    $ekstensi_sampul = explode('.', $namaFile);
    $ekstensi_sampul = strtolower(end($ekstensi_sampul));
    if ( !in_array($ekstensi_sampul, $ekstensi)) {
        echo "<script>
                alert('Silahkan masukan sampul yang benar');
              </script>";
        return false;
    }

    if ($size > 1000000) {
        echo "<script>
                alert('Ukuran sampul terlalu besar');
              </script>";
        return false;
    }

    move_uploaded_file($tmpName, 'img/'.$namaFile);
    return $namaFile; 

}

?>