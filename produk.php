<!--Jawaban Soal Nomor 10-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEVEL 3 - TUGAS 10</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <script src="js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Pijarcamp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Product <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Help
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Documentation</a>
                        <a class="dropdown-item" href="#">Join on Discord</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">About</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Kata kunci" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Cari</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4>Data Produk
                    <button type="button" class="btn btn-primary btn-md active float-right" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                </h4>
            </div>
            <div class="card-body">
                <table id="dataTabel" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('app/config.php');
                        $datas = mysqli_query($koneksi, "select * from produk") or die(mysqli_error($koneksi));
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($datas)) {
                        ?>

                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td>Rp <?= $row['harga']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>

                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEdit<?php echo $row['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapus<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>

                                    <!--Modal Edit Data-->
                                    <div class="modal fade" id="modalEdit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit Produk</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="app/edit.php" method="post" role="form">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" name="nama" required="" class="form-control" value="<?= $row['nama_produk']; ?>">
                                                            <input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <textarea class="form-control" name="keterangan"><?= $row['keterangan']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga</label>
                                                            <input type="text" name="harga" class="form-control" value="<?= $row['harga']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jumlah</label>
                                                            <input type="text" name="jumlah" class="form-control" value="<?= $row['jumlah']; ?>">
                                                        </div>
                                                        <hr>
                                                        <button type="submit" class="btn btn-info" name="edit"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Akhir Modal Edit Data-->
                                    <!--Modal Hapus Data-->
                                    <div class="modal fade" id="modalHapus<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form action="" method="GET">
                                                    <div class="modal-header bg-dark">
                                                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Hapus Data</h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus data ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id" value="" />
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal</button>
                                                        <a class="btn btn-danger" href="app/hapus.php?id=<?= $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Akhir Modal Hapus Data-->
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Modal Tambah Data-->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="app/tambah.php" method="post" role="form">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" class="form-control" onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" onkeypress="return hanyaAngka(event)">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" name="submit" value="simpan"><i class="fa fa-save" aria-hidden="true"></i> Simpan </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Batal </button>
                    </form>

                </div>
            </div>
        </div>
        <!--Akhir Modal Tambah Data-->
        <script>
            $(document).ready(function() {
                $('#dataTabel').DataTable();
            });
        </script>
</body>

</html>