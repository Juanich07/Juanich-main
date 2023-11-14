<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="assets/css/demo.css" rel="stylesheet" />
    </head>

    <body>
        <?php 
            require('config/config.php');
            require('config/db.php');

            $result_per_page = 10;
            $query = "SELECT * FROM employee";
            $result = mysqli_query($conn, $query);
            $number_of_result = mysqli_num_rows($result);

            $number_of_page = ceil($number_of_result/$result_per_page);

            if(!isset($_GET['page'])){
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }
            
            $page_first_result = ($page-1)*$result_per_page;

            $query = "SELECT * FROM employee ORDER BY name LIMIT ".$page_first_result.','.$result_per_page;

            //$result = mysqli_query($conn, $query);

            $employee = mysqli_fetch_all($result, MYSQLI_ASSOC);

            mysqli_free_result($result);

            mysqli_close($conn);
        ?>
        <div class="wrapper">
            <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
                        <!--
                    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                    Tip 2: you can also add an image using data-image tag
                    -->
                <div class="sidebar-wrapper">
                    <?php
                        $active_sidebar = "employee";
                        include('includes/sidebar.php');
                    ?>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <?php include('includes/navbar.php');?>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card strpied-tabled-with-hover">
                                        <div class="card-header ">
                                            <h4 class="card-title">EMPLOYEES</h4>
                                            <p class="card-category">Here is the lists of EMPLOYEES</p>
                                        </div>

                                        <div class="col-md-12">
                                            <a href="office-add.php">
                                                <button type="submit" class="btn btn-info btn-fill pull-right">
                                                    ADD NEW EMPLOYEES
                                                </button>
                                            </a>
                                        </div>
                                        <div class="card-body table-full-width table-responsive">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>id</th>
                                                    <th>lastname</th>
                                                    <th>firstname</th>
                                                    <th>office_id</th>
                                                    <th>address</th>
                                                    <!-- <th>Country</th>
                                                    <th>Postal</th>
                                                    <th>Action</th> -->
                                                </thead>
                                                <tbody>
                                                    <?php foreach($employee as $employee) : ?>
                                                    <tr>
                                                        <td><?php echo $employee['id']; ?></td>
                                                        <td><?php echo $employee['lastname']; ?></td>
                                                        <td><?php echo $employee['firstname']; ?></td>
                                                        <td><?php echo $employee['office_id']; ?></td>
                                                        <td><?php echo $employee['address']; ?></td>
                                                        
                                                        <td>
                                                            <div class="d-flex justify-content-end">
                                                                <a href="office-edit.php?id=<?php echo $employee['id']; ?>">
                                                                    <button class="btn btn-warning btn-fill mx-1">Edit</button>
                                                                </a>
                                                                <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $employee['id']; ?>)">
                                                                    <button class="btn btn-danger btn-fill mx-1">Delete</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <script>
                                                            function confirmDelete(id) {
                                                                var result = confirm("Are you sure you want to delete this record?");
                                                                if (result) {
                                                                    window.location.href = 'office-delete.php?id=' + id;
                                                                }
                                                            }
                                                        </script>

                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php
                                for($page=1; $page<= $number_of_page; $page++){
                                    echo '<a href = "employee.php?page='.$page.'" class = "btn mx-1">'.$page.'</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                            <p class="copyright text-center">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                            </p>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>
    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>