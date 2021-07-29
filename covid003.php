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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Athiti&family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
            font-size: medium;
        }

        p {
            font-family: 'Athiti', sans-serif;
            font-size: medium;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

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

            .row.content {
                height: auto;
            }
        }
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
        $aumper = $_GET['aumper'];
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="content">
                    <center><h2>ข้อมูลเตียงภาพรวม ของอำเภอ<?php echo $aumper; ?> </h2> <br></center>
          
    
                </div>

                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>ชื่อสถานที่</th>
                                                <th>ประเภท</th>
                                                <th>จำนวนเตียงทั้งหมด</th>
                                                <th>จำนวนเตียงที่ใช้ไป</th>
                                                <th>จำนวนคงเหลือ</th>
                                                <th>สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                $aumper = $_GET['aumper'];
                                                // echo $filter;   // ทดสอบค่าตัวแปล 
                                                $lvsqlQuery="SELECT *  FROM  coviddata where aumper='$aumper' ";
                                                //echo $lvsqlQuery;
                                                $sql = mysqli_query($Conn, $lvsqlQuery);

                                                if (mysqli_num_rows($sql) == 0) {
                                                    echo '<tr><td colspan="8">ไม่พบข้อมูล.</td></tr>';
                                                } else {
                                                    $no = 1;
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                            echo '
                                                                    <tr>
                                                                        <td>' . $no . '</td>
                                                                        <td> ' . $row['name'] . '</a></td> <td>';

                                                            if ($row['type'] == 'FI') {
                                                                echo ' Factory Isolation ';
                                                            }
                                                            //else if ($row['gap'] == 0 ){
                                                            else {
                                                                echo 'Community Isolation ';
                                                            }

                                                            echo ' </td>
                                                                        <td>' . $row['bedall'] . '</td>
                                                                        <td>' . $row['bedused'] . '</td>
                                                                        <td>' . $row['bedremain'] . '</td>
                                                
                                                                        <td>';
                                                            if ($row['bedremain'] == 0) {
                                                                echo '<a href="showmember.php?action_even=delete&p_id=' . $row['p_id'] . '" title="ลบข้อมูล" class="btn btn-danger btn-sm">เตียงเต็ม </a>';
                                                            }
                                                            //else if ($row['gap'] == 0 ){
                                                            else {
                                                                echo '<a href="editmember.php?p_id=' . $row['p_id'] . '" title="ยังมีเตียงว่าง" class="btn btn-info btn-sm"> ยังมีเตียงว่าง </a>';
                                                            }

                                                            echo '
                                                            </td>
                                        
                                                            </tr>
                                                            ';
                                                        $no++;
                                                    }
                                                }
                                                ?>
                                       
                                        </tbody>
                                    </table>
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

    <!-- Optional JavaScript -->    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

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