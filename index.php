<!DOCTYPE html>
<?php
include("conn.php");
//include("checklogin.php");
?>

<!--  Developed By Dech  8/1/2564 -->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>หน้าหลักการจัดการข้อมูล</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Athiti&family=Kanit:wght@300&display=swap" rel="stylesheet">
/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        <style>

            .content {
                    margin-top: 100px;
                }
                body {
                font-family: 'Athiti', sans-serif;
                }
                h1 {
                font-family: 'Athiti', sans-serif;
                }
                table {
                font-family: 'Athiti', sans-serif;
                font-size:medium;
                }
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
            background-color: #555;
            color: white;
            padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;} 
            }
</style>
        </style>

        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">ระบบจัดการข้อมูล</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <?php
                include("headmenu.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">ระบบจัดการข้อมูลสถานการณ์ Covid จังหวัดนครปฐม</h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">สถิติข้อมูลระบบ</li>
                        </ol>


                        <?php
                        
                        // Query PHP ดึงสมาชิกทั้งหมด
                        $lvSql= "SELECT Sum(coviddata.bedall) AS sum_bed FROM coviddata ";
                        //echo $lvSql;
                        $sql = mysqli_query($Conn, $lvSql);
                        if(mysqli_num_rows($sql) == 0){
                            echo "ไม่พบข้อมูล";
                            //header("Location: index.php");
                        }else{
                            $row = mysqli_fetch_assoc($sql);
                        }
                        ?>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4 ">
                                    <div class="card-body">จำนวนเตียงทั้งระบบ</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class=" text-white stretched-link" href="covid002.php"><?php echo $row['sum_bed']; ?> เตียง</a>
                                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        <?php               
                        // Query PHP ดึงสมาชิกทั้งหมด
                        $lvSql= "SELECT Sum(coviddata.bedused) AS sum_bedused FROM coviddata ";
                        //echo $lvSql;
                        $sql = mysqli_query($Conn, $lvSql);
                        if(mysqli_num_rows($sql) == 0){
                            echo "ไม่พบข้อมูล";
                            //header("Location: index.php");
                        }else{
                            $row1 = mysqli_fetch_assoc($sql);
                        }
                        ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">เตียงที่ใช้ไปแล้ว</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class=" text-white stretched-link" href="covid002.php"> <?php echo $row1['sum_bedused']; ?> เตียง </a>
                                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <?php               
                                // Query PHP ดึงสมาชิกทั้งหมด
                                $lvSql= "SELECT   sum(coviddata.bedremain) AS sum_bedremain FROM  coviddata";
                                //echo $lvSql;
                                $sql = mysqli_query($Conn, $lvSql);
                                if(mysqli_num_rows($sql) == 0){
                                    echo "ไม่พบข้อมูล";
                                    //header("Location: index.php");
                                }else{
                                    $row2 = mysqli_fetch_assoc($sql);
                                }
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">เตียงคงเหลือ</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class=" text-white stretched-link" href="covid002.php"><?php echo $row2['sum_bedremain']; ?>  เตียง</a>
                                        <div class=" text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <?php               
                                // Query PHP ดึงสมาชิกทั้งหมด
                                $lvSql= "SELECT   count(coviddata.id) AS countfull FROM  coviddata where bedremain=0";
                                //echo $lvSql;
                                $sql = mysqli_query($Conn, $lvSql);
                                if(mysqli_num_rows($sql) == 0){
                                    echo "ไม่พบข้อมูล";
                                    //header("Location: index.php");
                                }else{
                                    $row3 = mysqli_fetch_assoc($sql);
                                }
                            ?>


                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">เตียงเต็มแล้ว</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class=" text-white stretched-link" href="covid002.php"><?php echo $row3['countfull']; ?> แห่ง</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
      

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Nakhon Pathom Rajabhat University 2021</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
