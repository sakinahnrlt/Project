<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
require 'functions.php';

//penghalamanan
//konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData =count(query("SELECT * FROM mata_kuliah"));
$jumlahHalaman =ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]))? $_GET["halaman"] :1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//


$mata_kuliah =query ("SELECT * FROM mata_kuliah LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari di tekan
if (isset($_POST["cari"])){
    $mata_kuliah = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Matakuliah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
<h1 class="text-center card-header bg-primary text-white">DAFTAR Matakuliah</h1>
<br>
<br>
    <form action="" method="post">
    <input type="text" name="keyword" autofocus placeholder="Masukan Kata Kunci" id="keyword">
        <button type="submit" name="cari" id="tombol-cari" class="btn btn-primary ">Cari</button>
        <a href="tambah.php" class="btn btn-primary">TAMBAH</a>
        <a href="logout.php" class="btn btn-primary">KELUAR</a>
	</form>
    <br>
    <br>
    <table class="table table-striped">

            <tr  class="primary">
                <th>NO.</th>
                <th>AKSI</th>
                <th>Kode_Mk</th>
                <th>Nama_Mk</th>
                <th>Kelas</th>
                <th>Dosen_Pengajar</th>
                <th>Ruang</th>
                <th>Hari</th>
                <th>SKS</th>
            </tr>
<?php $i =1; ?>
<?php foreach ( $mata_kuliah as $row) : ?>           
            <tr>
                <td><?= $i ?></td>
                <td>
                	<a href="ubah.php?id=<?= $row ["id"]; ?>">Ubah</a>
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>
                </td>
                <td><?= $row["Kode_Mk"]; ?></td>
                <td><?= $row["Nama_Mk"]; ?></td>
                <td><?= $row["Kelas"]; ?></td>
                <td><?= $row["Dosen_Pengajar"]; ?></td>
                <td><?= $row["Ruang"]; ?></td>
                <td><?= $row["Hari"]; ?></td>
                <td><?= $row["SKS"]; ?></td>
                
            </tr>
<?php $i++; ?>
<?php endforeach; ?>

        </table>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>