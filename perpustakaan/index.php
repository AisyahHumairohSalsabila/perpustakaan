<?php 
//koneksi database
require "functions.php";

//query
$buku = query("SELECT * FROM data_buku");

if (isset($_POST["kirim"])) {

    
    if(tambah($_POST) > 0){
        echo "
            <script>   
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "data gagal ditambahkan!!";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>perpustakaan</title>
    <style>
        .table{
            padding-top: 2rem;
        }
    </style>
  </head>
  <body>
   
  <div class="container">
  <div class="card">
  <div class="card-header">
    <h5>Perpustakaan SMK WIKRAMA BOGOR</h5>
  </div>
  <div class="card-body">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    + tambah data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form tambah buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label for="kode_buku" class="form-label">Kode Buku</label>
                            <input type="text" class="form-control" id="kode_buku" name="kode_buku">
                        </div>
                        <div class="mb-2">
                            <label for="judul_buku" class="form-label">Judul Buku</label>
                             <input type="text" class="form-control" id="judul_buku" name="judul">
                        </div>
                        <div class="mb-2">
                           <label for="pengarang" class="form-label">Pengarang</label>
                          <input type="text" class="form-control" id="pengarang" name="pengarang">
                        </div>
                        <div class="mb-2">
                            <label for="judul_buku" class="form-label">Kelas</label>
                             <input type="number" class="form-control" id="judul_buku" name="kelas" placeholder="10/11/12">
                        </div>
                       <div class="mb-2">
                             <label for="Sampul_buku" class="form-label">Sampul Buku</label>
                            <input type="file" class="form-control" name="sampul" id="Sampul buku">
                        </div>    
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary" name="kirim">Selesai</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col">
        <table class="table">
            <thead class="table-light">
                <th>No</th>
                <th>Kode buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kelas</th>
                <th>Sampul</th>
            </thead>
            <?php $i = 1; ?>
            <?php foreach( $buku as $row ) : ?>
            <tbody>
                <td><?= $i; ?></td>
                <td><?= $row["kode_buku"];?></td>
                <td><?= $row["judul"];?></td>
                <td><?= $row["pengarang"];?></td>
                <td><?= $row["kelas"];?></td>
                <td> <img src="img/<?= $row["sampul"];?>" alt="" width="50rem"></td>
            </tbody>
            <?php $i++; ?>
            <?php endforeach; ?> 
        </table>
        </div>
    </div>
    

 </div>
    <blockquote class="blockquote mb-0">
      <footer class="blockquote-footer"><cite title="Source Title">Aisyah humairoh</cite></footer>
    </blockquote>
  </div>
</div>
  </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>