<?php
	include 'config.php';
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$keterangan = $_POST['keterangan'];
		$harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

		mysqli_query($koneksi, "update produk set nama_produk='$nama', keterangan ='$keterangan', harga='$harga', jumlah='$jumlah' where id ='$id'") or die(mysqli_error($koneksi));

		echo "<script>alert('data berhasil diupdate.');window.location='../produk.php';</script>";
	} else {
        echo "ERROR, data gagal diedit". mysqli_error($koneksi);
    }
?>