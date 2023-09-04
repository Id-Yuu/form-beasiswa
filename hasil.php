<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Beasiswa</title>
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <link href="./assets/css/bootstrap@5.0.2_css.min.css" rel="stylesheet">
    <script src="./assets/js/bootstrap@5.0.2_js.bundle.min.js"></script>
</head>
<body class="bg-secondary">
<div class="container">
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pendaftaran Beasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hasil.php">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="min-vh-100 d-flex flex-column justify-content-center align-items-center p-5">
        <div class="table-responsive p-5 bg-light">
            <blockquote class="blockquote fs-6">
                <p>Tipe Beasiswa</p>
                <ul>
                    <li>Kelas/K1 = Kelas satu / Akademik</li>
                    <li>Kelas/K2 = Kelas dua / Non Akademik</li>
                    <li>Kelas/K3 = Kelas tiga / Lainnya</li>
                </ul>
            </blockquote>
            <table class="table table-hover table-bordered table-striped">
                <!-- `nama`, `email`, `no_hp`, `semester`, `last_ipk`, `beasiswa`, `syarat_berkas` -->
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No. Hp</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Ipk</th>
                        <th scope="col">Beasiswa</th>
                        <th scope="col">Berkas</th>
                        <th scope="col">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        include_once 'functions/connection.php';
                        // Ambil data dari table daftar
                        $sql = "SELECT * FROM daftar";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // menampilkan data dari database
                            while($row = mysqli_fetch_assoc($result)) { 
                                $beasiswa = $row['beasiswa'];
                                // Jika data beasiswa tidak memenuhi syarat
                                if($beasiswa == '' || $beasiswa == null) {
                                    $beasiswa = "Tidak Memenuhi Syarat beasiswa";
                                }
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["no_hp"]; ?></td>
                        <td><?php echo $row["semester"]; ?></td>
                        <td><?php echo $row["last_ipk"]; ?></td>
                        <td><?php echo $beasiswa; ?></td>
                        <td>
                            <!-- Buat download btn dari fungsi download -->
                            <a class="btn btn-primary" href="functions/download.php?filename=<?php echo $row["syarat_berkas"]; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <?php
                            // Cek status ajuan 
                                if($row["status_ajuan"] == 1) {
                                    echo "Sudah terverifikasi";
                                } else {
                                    echo "Belum diverifikasi";
                                }
                            ?>
                        </td>
                        <td>
                            <!-- Tombol delete -->
                            <a class="btn btn-danger" href="functions/delete.php?id=<?php echo $row["id"]; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                            </a></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>