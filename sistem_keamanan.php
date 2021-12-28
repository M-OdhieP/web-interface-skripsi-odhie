<?php
session_start();
include "koneksi.php";
define("INDEX", true);
if ($_SESSION['id'] == '') {
    echo "<meta http-equiv='refresh'
	content='0; url=index.php'>";
}
?>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>




    <title>Sistem Keamanan Sepeda Motor</title>
</head>

<body id="home">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm sticky-md-top">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Keamanan Kendaraan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#home">Beranda</a>
                    <a class="nav-link" href="profil/index.html">Profil</a>
                    <a class="nav-link" onclick="return confirm('yakin ingin keluar ?')" href="logout.php">Keluar</a>

                </div>
            </div>
        </div>

    </nav>











   




        <?php
        $sql = "SELECT * FROM perangkat_key";
        $tampil = mysql_query($sql);
        $data = mysql_fetch_array($tampil);
        $data_key = $data['data_key'];
        ?>

    <br>


    <div class="row text-center">
        <div class="col">
            <h1>Data Sistem dan GPS Kendaraan</h1>
        </div>
    </div>

    <div class="card-header noborder" style="text-align: center;">
        <h4 class="bayangan text-white">Data Sistem dan GPS Kendaraan</h4>







        <!-- 
	<div class="container" style="justify-content: center;"> -->

        <div class="card text-dark bg-light mb-3" style="max-width: 30rem; margin: auto;">
            <div class="card-header" style="text-align: center;">
                <p class="fw-bold">Fungsi-fungsi Sistem keamanan Sepeda Motor</p>
            </div>

            <?php
			// Tampilkan data dari Database
			$sql = "SELECT * FROM data ORDER BY nomor_data DESC";
			$tampil = mysql_query($sql);
			$data = mysql_fetch_array($tampil)   ?>




            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fungsi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Perangkat Key</td>
                        <td>
                            <div class="form-check form-switch" style="text-align: center;">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                    onchange="ubahstatus(this.checked)" <?php if ($data_key == 1) echo "checked"; ?>>
                                <label class="form-check-label" for="flexSwitchCheckDefault"> <span id="status"><?php if ($data_key == 1) echo "ON";
																												else echo "OFF"; ?></span> </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Buka Koordinat melalui Google Maps</td>
                        <td> <a class="btn btn-info text-light" onclick="return confirm('Akan membuka Google Maps')"
                                href="https://www.google.com/maps/place/<?php echo $data['data_koordinat']; ?>">Buka</a>
                        </td>
                    </tr>
                </tbody>
            </table>



        </div>



        <br>

        <style>
            .tabelodhie {

                width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            .tengah {
                text-align: center;
                float: center;

            }
        </style>
        <div class="tabelodhie">
            <table id="example"
                class="tengah table table-striped table-bordered table-hover text-nowrap table-responsive display">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Koordinat Kendaraan</th>
                        <th>Waktu</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
					// Tampilkan data dari Database
					$sql = "SELECT * FROM data ORDER BY nomor_data DESC";
					$tampil = mysql_query($sql);
					$no = 1;
					while ($data = mysql_fetch_array($tampil)) {
						$Kode = $data['nomor_data']; ?>

                    <tr>

                        <td><?php echo $no++; ?></td>


                        <td><?php echo $data['data_koordinat']; ?> &nbsp;&nbsp; <a class="btn-sm btn-info text-light"
                                onclick="return confirm('Akan membuka Google Maps')"
                                href="https://www.google.com/maps/place/<?php echo $data['data_koordinat']; ?>">Buka</a>
                        </td>
                        <td><?php echo $data['waktu']; ?></td>



                    </tr>

                    <?php } ?>

                </tbody>
                <tfoot>
                    <tr>

                        <th>No</th>
                        <th>Koordinat Kendaraan</th>
                        <th>Waktu</th>

                    </tr>
                </tfoot>

            </table>
        </div>
    </div>



    <footer class="bg-secondary text-white text-center pt-1 pb-1">
        <p>Skripsi Muhamad Odhie Prasetio</p>
    </footer>




    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script src="script.js"></script>


</body>

</html>