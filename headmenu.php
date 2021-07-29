<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">เมนูหลัก</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            จัดการข้อมูลสถานที่ตั้ง
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" a href="index.php">จัดการข้อมูลสมาชิก</a>
                                <a class="nav-link" a href="index.php">แสดงข้อมูลสมาชิก (MAP)</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" target="_blank" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            จัดการข้อมูลผู้ป่วย
                        </a>
                        <a class="nav-link" target="_blank" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            จัดการข้อมูลการตรวจ
                        </a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            จัดการข้อมูลการติดตามผล
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ออกจากระบบ
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php 
                        
                        //session_start();
                        if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])){  //check session
                        
                            echo $_SESSION['uname'];  //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
                        }
                    ?>
                    
                </div>
            </nav>
        </div>