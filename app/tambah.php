<?php				
	include 'config.php';

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        $datas = mysqli_query($koneksi, "insert into produk (nama_produk,keterangan,harga,jumlah)values('$nama', '$keterangan', '$harga', '$jumlah')") or die(mysqli_error($koneksi));
        
        echo "<script>alert('data berhasil disimpan.');window.location='../produk.php';</script>";
    } else {
        echo "ERROR, data gagal ditambah". mysqli_error($koneksi);
    }
?>