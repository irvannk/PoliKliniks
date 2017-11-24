<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
  body{
    overflow-x: hidden;
  }
  </style>
    <link href="../assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
     body{
      background-color: #F7F7F7;
    }
    </style>
</head>
 <body class="nav-md">
  <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-home"></i> <span>Front Line</span></a>
            </div>

            <div class="clearfix"></div>

            <!--  Ini menu profile -->
           <div class="profile">
              <div class="profile_pic">
              <img src='../images/' style='height: 65px; width: 70px;' class='img-circle profile_img'>
              </div>
              <div class='profile_info' style='margin-bottom: 40px;'>
              <h2 style='padding-top: 15px; padding-bottom: 3px;'><a href='profile.php' style='color: white'></a>
              <?php echo $_SESSION['username']; ?>
              </h2>

              </div>
            </div>
            <!-- /Sampai sini -->

            <br />

            <!-- Ini menu sidebar -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  style="background-color: #1c2d3e; margin-top: -30px;">
              <div class="menu_section">
                <h3>Menu Utama</h3>
                <ul class="nav side-menu">
                  <li><a href="home.php"><i class="fa fa-home" style="font-size: 21px;"></i> Home </span></a></li>
                   <li><a><i class="fa fa-user-o" style="font-size: 19px;"></i> Data <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                      <li><a href="data_admin.php">Data Admin</a></li>
                      <li><a href="data_anggota.php">Data Anggota</a></li>
                      <li><a href="data_buku.php">Data Buku</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="pinjam_buku.php">Transaksi</a></li>
                      <li><a href="history_peminjaman.php">History Peminjaman</a></li>
                      <li><a href="history_pengembalian.php">History Pengembalian</a></li>
                    </ul>
                  </li>
                  <li><a><i class="glyphicon glyphicon-print" style="font-size: 17px;"></i>&nbsp&nbsp&nbspLaporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Data<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="laporan_admin.php">Data Admin</a>
                            </li>
                            <li><a href="laporan_anggota.php">Data Anggota</a>
                            </li>
                            <li><a href="laporan_buku.php">Data Buku</a>
                            </li>
                          </ul>
                        </li>
                      <li><a>Transaksi<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="laporan_peminjaman.php">Peminjaman Buku</a>
                            </li>
                            <li><a href="laporan_pengembalian.php">Pengembalian Buku</a>
                            </li>
                            <li><a href="laporan_perpanjangan.php">Perpanjangan Buku</a>
                            </li>
                          </ul>
                        </li>
                      </li>
                </ul>
                 <li><a href="../process/logout.php"><i class="fa fa-sign-out"  style="font-size: 20px;"></i> Logout </span></a>
                  </li>
              </div>
              <div class="menu_section">

              <div style="height: 250px; background-color: #1c2d3e"></div>
              </div>

            </div>
            <!-- /Sampai sini sidebar menunya -->
          </div>
        </div>


          <div class="modal fade" id="newRe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="H4">User Profile</h4>
                  </div>
                  <div class="modal-body">
                  <?php
                  include '../connection.php';

                  $jeneng = $_SESSION['nama'];
                  $query = mysqli_query($connect, "SELECT * FROM d_users WHERE nama = '$jeneng'");
                  $data  = mysqli_fetch_array($query);
                  $query2 = mysqli_query($connect, "SELECT * FROM users WHERE nama = '$jeneng'");
                  $data2  = mysqli_fetch_array($query2);

                  ?>
                        <form action="proses-profile.php" method="POST">
                        <?php
                         echo"
                        <img  data-toggle='modal' data-target='#hahah' class='media-object img-thumbnail user-img' style='width: 35%; height: 10%; margin-bottom: 20px;' src='../images/".$data2['foto']."'>
                        ";
                        echo "<h4>".$_SESSION['nama']."</h4>";
                        ?>
                          <br>
                          <label>Username</label>
                          <input class="form-control" type="text" name="username" value="<?php echo $_SESSION['username']?>">
                          <label>Email</label>
                          <input class="form-control" type="text" name="email" value="<?php echo $data['email']?>">
                          <label>Alamat</label>
                          <input class="form-control" type="text" name="alamat" value="<?php echo $data['alamat']?>">
                          <label>No Telepon</label>
                          <input class="form-control" type="text" name="pekerjaan" value="<?php echo $data['no_tlp']?>">
                          <label>Usia</label>
                          <input class="form-control" type="text" name="pekerjaan" value="<?php echo $data['usia']?>">
                          <label>Status</label>
                          <input class="form-control" type="text" placeholder="Pekerjaan/Pelajar" name="pekerjaan" value="<?php echo $data['status']?>">
                          <br />
                          <input type="submit" value="Selesai" class="btn btn-success">
                        </form>
                  </div>
                </div>
              </div>
            </div>
                 <div class="modal fade" id="PW" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="H4">Ubah Password</h4>
                                        </div>
                                        <div class="modal-body">

            <form action="proses-password.php" method="POST">
                <label>Password Lama</label>
                <input class="form-control" type="password" name="pwlama" required>
                <label>Password Baru</label>
                <input class="form-control" type="password" name="pwbaru" required>
                <label>Password Konfirmasi</label>
                <input class="form-control" type="password" name="pwbaru2" required>
                <br />
                <input type="submit" value="Selesai" class="btn btn-success">
            </form>
                                        </div>
                                    </div>
                                </div>
                         </div>


        <!-- Ini navigasi atas -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class= "fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <img src='../images/'>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"  data-toggle='modal'  data-target='#newRe'> Profile</a></li>
                    <li>
                      <a href="javascript:;" data-toggle='modal' data-target='#PW'>
                        <span>Ubah Password</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        <div class="x_title"><br />
        <font size="5">Home</font>
        </div><br>

        <br>

        </div>

            </div>

          </div>
          <br />

          <div class="row">

            </div>
        <footer  style="background-color: #F7F7F7; margin-top: -20px;">
          <div class="pull-right">
            &copy Copyright FrontLine 2016 by Irvan All Right Served.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <script src="../assets/bootstrap/jquery.min.js"></script>
    <script src="../assets/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/custom.min.js"></script>
    <script src="../assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
</body>
</html>
