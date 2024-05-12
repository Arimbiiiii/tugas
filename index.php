<?php
session_start();
if(empty($_SESSION['user']) && empty($_SESSION['pass'])) {
    echo "<script>window.location.replace('../index.php')</script>";
}
echo"<strong>HALAMAN DASHBOARD</strong><BR>";

echo"<a href=logout.php>LOGOUT</a>";
include "../assets/function.php";
$airpam = new klas_airpam;
$koneksi =$airpam->koneksi();
$level =$airpam->level($_SESSION['user']);
$data_user=$airpam->data_user($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                Dashboard
                            </a>
                            <?php
                            if($level=="Admin"){
                                //manajemen user,lihat data meter,lihat tagihan
                            ?>
                            <a class="nav-link" href="index.php?p=user">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                Manajemen user
                            </a>
                            <a class="nav-link" href="index.php?p=lihat_tagihan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                Data Meter
                            </a>
                            <a class="nav-link" href="index.php?p=lihat_aduan">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                Melihat Aduan
                            </a>
                            <a class="nav-link" href="index.php?p=ubah_data_warga">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                Mengubah Data Warga
                            </a>
                            <?php
                            } elseif ($level== "warga"){
                            ?>
                                <a class="nav-link" href="index.php?p=lihat_tagihan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                    Lihat Tagihan
                                </a>
                                <a class="nav-link" href="index.php?p=kirim_aduan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;" ></i></div>
                                    Form Aduan
                                </a>
                                <a class="nav-link" href="index.php?p=cek_email">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: green;"></i></div>
                                    Notifikasi Email
                                </a>
                            <?php
                            } elseif ($level=="Petugas"){
                            ?>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Input data meter 
                                </a>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Melihat Data Warga
                                </a>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Input data meter 
                                </a>
                                <a class="nav-link" href="index.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Melihat Aduan
                                </a>
                            <?php 
                            }elseif ($level=="Bendahara"){
                            ?>
                                <a class="nav-link" href="index.html">
                                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                     Melihat Data Pembayaran
                                </a>
                            <?php
                            }
                            ?>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                        
                    </div>
                    <div class="sb-sidenav-footer">
                    <div class="sb-sidenav-footer"><i class="fa fa-key" aria-hidden="true" style="color: gold;"></i> Logged in as <?php echo $level; ?>:</div>
                    <i class="fa fa-address-card" aria-hidden="true" style="color: blue;"></i>

                        <?php
                        //Nama user (kota)
                        echo $data_user[1] . '('. $data_user[2] . ')';
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                        $uri=$_SERVER['REQUEST_URI'];
                        $e = explode("=", $uri);
                        if(!empty($e[1])) {
                            if ($e[1] == "user"|| $e[1] =="user_edit&nik") {
                                $h1 = "Manajemen user";
                                $h2 = "Menu untuk menejemen user";
                            }elseif ($e[1] == "lihat_tagihan") {
                                $h1 = "lihat Data Tagihan";
                                $h2 = "Menu untuk melihat data tagihan warga";
                            }elseif ($e[1] == "lihat_aduan") {
                                $h1 = "Melihat Aduan";
                                $h2 = "Menu untuk aduan warga";
                            }elseif ($e[1] == "ubah_data_warga") {
                                $h1 = "Mengubah Data Warga";
                                $h2 = "Menu untukmengubah warga";
                            }
                        }else {
                            $h1 = "Dashboard";
                            $h2 = "Menu Dashboard";
                        }
                        // echo "uri: $e[1]";
                        ?>
                        <h1 class="mt-4"><?php echo $h1 ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo $h2 ?> </li>
                        </ol>
                        <div class="row" id= "summary">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id= "chart">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['tombol'])) {
                            $t = $_POST['tombol'];
                            if ($t == "user_add") {

                                $NIK = $_POST['NIK'];
                                $NAMA = $_POST['NAMA'];
                                $ALAMAT = $_POST['ALAMAT'];
                                $KOTA = $_POST['KOTA'];
                                $NO_HP = $_POST['NO_HP'];
                                $EMAIL = $_POST['EMAIL'];
                                $LEVEL = $_POST['LEVEL'];
                                $USERNAME = $_POST['USERNAME'];
                                $PASSWORD = $_POST['PASSWORD'];
                        
                                //cek nik atau admin ga boleh kembar dg yg ada di tabel user
                            $qc = mysqli_query($koneksi, "SELECT NIK FROM user WHERE NIK='$NIK' OR USERNAME='$USERNAME'");
                            $qj = mysqli_num_rows($qc);
                            if (empty($qj)) { //tidak kembar
                                //masukkan data ke tabel user
                                mysqli_query($koneksi, "INSERT INTO user (NIK,NAMA,ALAMAT,KOTA,NO_HP,EMAIL,LEVEL,USERNAME,PASSWORD) VALUES ('$NIK',\"$NAMA\",'$ALAMAT','$KOTA','$NO_HP','$EMAIL','$LEVEL','$USERNAME','$PASSWORD')");
                                if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                    echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> berhasil diinput....
                                        </div>";
                                } else { //data gagal masuk
                                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> gagal diinput....
                                        </div>";
                                }
                            } else { //ada yg kembar
                                echo "<div class=\"alert alert-danger alert-dismissible fade show\" id=alert-user>
                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                        <strong>NIK $nik atau Username $user</strong> sudah ada....
                                    </div>";
                            }
                            }elseif ($t == "user_edit"){
                                $NIK = $_POST['NIK'];
                                $NAMA = $_POST['NAMA'];
                                $ALAMAT = $_POST['ALAMAT'];
                                $KOTA = $_POST['KOTA'];
                                $NO_HP = $_POST['NO_HP'];
                                $EMAIL = $_POST['EMAIL'];
                                $LEVEL = $_POST['LEVEL'];
                             
                                mysqli_query($koneksi, "UPDATE user SET NAMA=\"$NAMA\",ALAMAT='$ALAMAT',KOTA='$KOTA',NO_HP='$NO_HP',EMAIL='$EMAIL',LEVEL='$LEVEL' WHERE NIK='$NIK'");
                                if (mysqli_affected_rows($koneksi) > 0) {//data berhasil masuk
                                    echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data User</strong> berhasil diubah....
                                         </div>";
                                } else { //data gagal masuk
                                    echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> tidak ada perubahan....
                                        </div>";
                                }
                            }elseif ($t == "user_hapus") {
                                $NIK = $_POST['NIK'];
                                mysqli_query($koneksi, "DELETE FROM user WHERE NIK='$NIK'");
                                if (mysqli_affected_rows($koneksi)) { //data berhasil masuk
                                    echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> berhasil dihapus....
                                        </div>";
                                } else { //data gagal masuk
                                    echo "<div class=\"alert alert-success alert-dismissible fade show\">
                                            <button type=button class=btn-close data-bs-dismiss=alert></button>
                                            <strong>Data</strong> tidak jadi dihapus....
                                        </div>";
                                }
                            }
                      }elseif (isset($_GET['p'])) {
                        $p = $_GET['p'];
                        if ($p == "user_edit") {
                            $NIK = $_GET['nik'];
                            //ambil data dari tabel user sesuai nik
                            $q = mysqli_query($koneksi, "SELECT NAMA,ALAMAT,KOTA,NO_HP,EMAIL,LEVEL FROM user WHERE NIK='$NIK'");
                            $d= mysqli_fetch_row($q);
                                $NAMA= $d[0];
                                $ALAMAT= $d[1];
                                $KOTA= $d[2];
                                $NO_HP= $d[3];
                                $EMAIL= $d[4];
                                $LEVEL= $d[5];
                        }
                      }
                      ?>
                        <div class="card" id="user_add">
                            <div class="card-header">
                            <i class="fa-solid fa-user-plus text-success"></i> User
                            </div>
                            <div class="card-body">
                            <form action="" method="post" class="needs-validation" id="user_form">
                            <div class="mb-3 mt-3">
                                <label for="NIK" class="form-label">NIK:</label>
                                <input type="text" class="form-control" id="NIK" placeholder="Enter NIK" name="NIK" value="<?php echo $NIK ?>">
                            </div>
                            <div class="mb-3">
                                <label for="NAMA" class="form-label">NAMA:</label>
                                <input type="text" class="form-control" id="NAMA" placeholder="Enter NAMA" name="NAMA" value="<?php echo $NAMA ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ALAMAT" class="form-label">ALAMAT:</label>
                                <textarea class="form-control" rows="3" id="ALAMAT" name="ALAMAT" value="<?php echo $ALAMAT ?>"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="KOTA" class="form-label">KOTA:</label>
                                <input type="text" class="form-control" id="KOTA" placeholder="Enter KOTA" name="KOTA" value="<?php echo $KOTA ?>">
                            </div>
                            <div class="mb-3">
                                <label for="NO_HP" class="form-label">NO_HP:</label>
                                <input type="text" class="form-control" id="NO_HP" placeholder="Enter NO_HP" name="NO_HP" value="<?php echo $NO_HP ?>">
                            </div>
                            <div class="mb-3">
                                <label for="EMAIL" class="form-label">EMAIL:</label>
                                <input type="text" class="form-control" id="EMAIL" placeholder="Enter EMAIL" name="EMAIL" value="<?php echo $EMAIL ?>">
                            </div>
                            <div class="mb-3">
                                    <label for="LEVEL" class="form-label">LEVEL:</label> 
                                    <select class="form-select" name="LEVEL">
                                        <option value="">LEVEL</option>
                                        <?php
                                        $lvl1 = array("admin", "petugas", "bendahara", "warga");
                                        foreach ($lvl1 as $lvl2) {
                                            if ($level == $lvl2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$lvl2 $sel>" . ucwords($lvl2) . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            <div class="mb-3">
                                <label for="USERNAME" class="form-label">USERNAME:</label>
                                <input type="text" class="form-control" id="USERNAME" placeholder="Enter USERNAME" name="USERNAME" required>
                            </div>
                            <div class="mb-3">
                                <label for="PASSWORD" class="form-label">PASSWORD:</label>
                                <input type="PASSWORD" class="form-control" id="PASSWORD" placeholder="Enter PASSWORD" name="PASSWORD">
                            </div>
                            <button type="submit" class="btn btn-primary" name="tombol" value="user_add">Simpan</button>
                            </form>
                            </div>
                        </div>
                                <div class="card mb-4" id="user_list">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>NAMA</th>
                                            <th>ALAMAT</th>
                                            <th>KOTA</th>
                                            <th>NO_HP</th>
                                            <th>EMAIL</th>
                                            <th>LEVEL</th>
                                            <th></th>                                        
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                        $q = mysqli_query($koneksi, "SELECT NIK,NAMA,ALAMAT,KOTA,NO_HP,EMAIL,LEVEL FROM user ORDER BY LEVEL ASC, NAMA ASC");
                                        while ($d= mysqli_fetch_row($q)) {
                                            $NIK= $d[0];
                                            $NAMA= $d[1];
                                            $ALAMAT= $d[2];
                                            $KOTA= $d[3];
                                            $NO_HP= $d[4];
                                            $EMAIL= $d[5];
                                            $LEVEL= $d[6];
                                                   
                                            echo"<tr>
                                                    <td>$NIK</td>
                                                    <td>$NAMA</td>
                                                    <td>$ALAMAT</td>
                                                    <td>$KOTA</td>
                                                    <td>$NO_HP</td>
                                                    <td>$EMAIL</td>
                                                    <td>$LEVEL</td>
                                                    <td>
                                                    <a href=index.php?p=user_edit&nik=$NIK><button type=button class=\"btn btn-outline-success btn-sm\" onclick>Ubah</button></a>
                                                    <button type=button class=\"btn btn-outline-danger btn-sm\" data-bs-toggle=modal data-bs-target=#myModal data-nik=$NIK>Hapus</button>
                                                     </td>
                                        </tr>";
                                        }
                                        ?>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="../js/airpam.js"></script>
    </body>
</html>
