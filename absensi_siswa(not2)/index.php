<?php
require_once('main/crud/db.php');
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: main/login/index.php");
  exit;
 
}
?>
<html>
 <head>
  <title>Data Table User</title>
  <script src="assets/js/jquery-1.12.0.min.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css" />
  <script src="assets/js/bootstrap-datepicker.js"></script>
  
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <script src="assets/js/jquery.dataTables.min.js"></script>  
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
    <link href="assets/scss/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/css/default.css" id="theme" rel="stylesheet">
    
  <style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
  
  

 </head>


 <body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->

                <!-- logo -->
                <img src="assets/images/bakti_idhata.jpg" style="max-height: 150px; width: 200px; margin-left: 5px; margin-top: -70px;"/>

            <div class="scroll-sidebar" >
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                          <h4 id="nama" name="nama" style="text-align: center;">

                            <?php   $session = $_SESSION['username'];
                                    echo "HELLO,<h2 style='text-align: center;'>$session</h2>";
                            ?>             
                          </h4>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#"onclick="openPage('main.php')" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#"onclick="openPage('tabel-siswa.php')" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Absensi Siswa</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-profile.php')" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('tabel-jadwal.php')" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Tabel Siswa</span></a>
                        </li>
                        <!--<li> <a class="waves-effect waves-dark" href="#" onclick="openPage('map-google.php')" aria-expanded="false"><i class="fa fa-location-arrow"></i><span class="hide-menu">Location</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-blank.php')" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="#" onclick="openPage('pages-error.php')" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                        </li>-->
                       
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" id="page-content" style="margin-top: -60px;">
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center" style="margin-left: 250px;">© 2018 baqdhat</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
 </body>
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center" style="margin-left: 250px;">© 2018 baqdhat</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
 </html>

 <script type="text/javascript">
  $(document).ready(function() {
   $("#page-content").load("main/main.php");
 });
   function openPage(page){
    $("#page-content").load("main/"+page);
   }
 </script>