<?php

session_start();

if ($_SESSION['role']!=='admin') {
    header('Location: login.php');
}

require 'get_user.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplikasi Management Stok Barang" />
        <meta name="keywords" content="Management Stock, Stock App, Barang" />
        <meta name="author" content="Alan Nuari" />
        <link rel="shortcut icon" href="./images/iconcn.png" type="image/x-icon" />
        <title>Stok Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <?php require 'templates/topnavigation.php'; ?>
        
        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">Daftar Pengguna</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data Pengguna
                                </div>
                                <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah Pengguna
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_login_user as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['username']; ?></td>
                                                <td><?php echo $item['password']; ?></td>
                                                <td><?php echo $item['role']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['iduser']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['iduser']; ?>">
                                                        Hapus
                                                    </button>
                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $item['iduser']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="edit_user.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="iduser" value="<?php echo $item['iduser']; ?>">
                                                                <label class="mb-1">Username :</label>
                                                                <input type="text" name="username" value="<?php echo $item['username']; ?>" class="form-control mb-3" required>
                                                                <label class="mb-1">Password :</label>
                                                                <input type="text" name="password" value="<?php echo $item['password']; ?>" class="form-control mb-3" required />
                                                                <label class="mb-1">Role :</label>
                                                                <input type="text" name="role" value="<?php echo $item['role']; ?>" class="form-control mb-3" required />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapus<?php echo $item['iduser']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="hapus_user.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus <?php echo $item['username']; ?> ?</p>
                                                                <input type="hidden" name="iduser" value="<?php echo $item['iduser']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php require 'templates/footer.php'; ?>

            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="tambah_user.php">
                        <div class="modal-body">
                            <input type="text" name="namapengguna" placeholder="Nama Pengguna" class="form-control mb-3" required />
                            <input type="text" name="password" placeholder="Password" min="1" class="form-control mb-3" required />
                            <select name="role" id="inputPassword" class="form-control mb-3" required>
                                <option value="admin">admin</option>
                                <option value="staff">staff</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
