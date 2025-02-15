
<?php
// session_start();
// include('../includes/db_connection.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SuperAdmin Dashboard</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin-left: 250px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Header Style */
        header {
            background-color: #34495E;
            color: #fff;
            padding: 15px 30px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }

        header nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        header nav ul li {
            margin-left: 25px;
        }

        header nav ul li a {
            text-decoration: none;
            color: #BDC3C7;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        header nav ul li a:hover {
            color: #1ABC9C;
            padding-bottom: 2px;
            border-bottom: 2px solid #1ABC9C;
        }

        header .logo {
            font-size: 22px;
            font-weight: 600;
        }

       
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #2C3E50;
            color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
            font-size: 14px;
            z-index: 90;
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .sidebar ul li {
            margin: 12px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #BDC3C7;
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 10px 18px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar ul li a:hover {
            background-color: #2980B9;
            color: #fff;
            padding-left: 25px;
        }

        .sidebar ul li a.active {
            background-color: #34495E;
            color: #fff;
            border-left: 4px solid #1ABC9C;
        }

        .sidebar .sidebar-header {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            padding: 15px 0;
            color: #fff;
            background-color: #34495E;
            margin-bottom: 25px;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .sidebar .collapse-btn {
            position: absolute;
            top: 50%;
            right: -30px; 
            transform: translateY(-50%);
            background-color: #2980B9;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .sidebar .collapse-btn:hover {
            background-color: #1ABC9C;
        }

      
        .content-wrapper {
            margin-left: 250px;
            padding: 30px;
            margin-top: 80px;
            flex: 1;
            transition: margin-left 0.3s ease-in-out;
        }

        .content-wrapper.collapsed {
            margin-left: 80px;
/* ======= */
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        #content {
            width: 100%;
            padding: 20px;
            transition: all 0.3s;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        /* Custom Scrollbar Styles for the dashboard */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            border: 1px solid black;

        }

        ::-webkit-scrollbar-thumb {
            background: black;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Navbar styles */
        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.18);
        }

        .navbar-light .navbar-nav .nav-link {
            color: black;
        }

        /* Sidebar styles */
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100dvh;
            max-width: 100dvh;
            background: black;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 30px;
            background: black;
            border-bottom: 2px solid #f5f5f5;
        }

        #sidebar ul.components {
            padding: 20px;
        }

        #sidebar ul li a {
            padding: 5px 0;
            margin: 10px;
            width: fit-content;
            font-size: 1em;
            display: block;
            border-bottom: 2px solid transparent;
        }

        #sidebar ul li a:hover {
            color: white;
            border-bottom: 2px solid white;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }

        /* Back to top button styles */
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            justify-content: center;
            align-items: center;
        }

        i.fa-arrow-up {
            font-size: 0.7em;
/* >>>>>>> be2342fd31dd4a1709e816814d2aa45dfff1b09c */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h5>Management System</h5>
            </div>

<!-- <<<<<<< HEAD -->
   
    <!-- <aside class="sidebar">
        <div class="sidebar-header">Admin</div>
        <ul>
            <li><a href="index.php" id="sidebarButtonHome" data-target="index.php"><i class="fas fa-home"></i><span class="sidebar-text">Home</span></a></li>
            <li><a href="#" id="sidebarButtonManageStaff" data-target="manage_customer.php"><i class="fas fa-users"></i><span class="sidebar-text">My Customers</span></a></li>
            <li><a href="#" id="sidebarButtonManageStaff" data-target="manage_staff.php"><i class="fas fa-users"></i><span class="sidebar-text">Manage Staff</span></a></li>
            <li><a href="#" id="sidebarButtonMyTeachers" data-target="teachers.php"><i class="fas fa-chalkboard-teacher"></i><span class="sidebar-text">My Teachers</span></a></li>
            <li><a href="#" id="sidebarButtonMyClasses" data-target="classes.php"><i class="fas fa-school"></i><span class="sidebar-text">My Classes</span></a></li>
            <li><a href="#" id="sidebarButtonMyStudents" data-target="students.php"><i class="fas fa-users"></i><span class="sidebar-text">My Students</span></a></li>
            <li><a href="#" id="sidebarButtonManageDocuments" data-target="documents.php"><i class="fas fa-file-alt"></i><span class="sidebar-text">Manage Documents</span></a></li>
            <li><a href="#" id="sidebarButtonManageFinance" data-target="finance.php"><i class="fas fa-wallet"></i><span class="sidebar-text">Manage Finance</span></a></li>
            <li><a href="#" id="sidebarButtonSettings" data-target="settings.php"><i class="fas fa-cogs"></i><span class="sidebar-text">Settings</span></a></li>
            <li><a href="#" id="sidebarButtonReports" data-target="reports.php"><i class="fas fa-chart-line"></i><span class="sidebar-text">Reports</span></a></li>
            <li><a href="#" id="sidebarButtonAboutUs" data-target="information.php"><i class="fas fa-info-circle"></i><span class="sidebar-text">About Us</span></a></li>
        </ul>
        <button class="collapse-btn" id="collapseButton"><i class="fas fa-arrow-left"></i></button>
    </aside> -->

   
    <header>
        <div class="logo">SuperAdmin Dashboard</div>
        <nav>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <script>
        
        document.getElementById('collapseButton').addEventListener('click', function () {
            var sidebar = document.querySelector('.sidebar');
            var contentWrapper = document.querySelector('.content-wrapper');
            var sidebarItems = document.querySelectorAll('.sidebar ul li a');
            
       
            sidebar.classList.toggle('collapsed');
            contentWrapper.classList.toggle('collapsed');
            
  
            sidebarItems.forEach(item => {
                var text = item.querySelector('.sidebar-text');
                if (sidebar.classList.contains('collapsed')) {
                    text.style.display = 'none';  
                } else {
                    text.style.display = 'inline';  
                }
            });

         
            var icon = document.querySelector('.collapse-btn i');
            if (sidebar.classList.contains('collapsed')) {
                icon.classList.remove('fa-arrow-left');
                icon.classList.add('fa-arrow-right');
            } else {
                icon.classList.remove('fa-arrow-right');
                icon.classList.add('fa-arrow-left');
            }
        });

      
        var sidebarLinks = document.querySelectorAll('.sidebar ul li a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function (e) {
              
            });
        });
    </script>

</body>

</html>
<!-- ======= -->
            <ul class="list-unstyled components">
                <li><a href="index.php">Home</a></li>
                <li><a href="manage_staff.php">Manage Staff</a></li>
                <li><a href="teachers.php">My Teachers</a></li>
                <li><a href="classes.php">My Classes</a></li>
                <li><a href="students.php">My Students</a></li>
                <li><a href="documents.php">Manage Documents</a></li>
                <li><a href="finance.php">Manage finance</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="information.php">About us</a></li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-fixed navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <a type="button" id="sidebarCollapse">
                        <i class="fas fa-align-left"></i>
                    </a>

                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Username <span class="caret" style="margin-left: 30px;"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"> 
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="#" role="button">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </div>
            </nav>

            Content of the page...

            <button
                type="button"
                class="btn btn-dark btn-floating"
                id="btn-back-to-top">
                <i class="fas fa-arrow-up"></i>
            </button>

            <script>
                $(document).ready(function() {
                    $('#sidebarCollapse').on('click', function() {
                        $('#sidebar').toggleClass('active');
                    });
                });

                //Get the button
                let mybutton = document.getElementById("btn-back-to-top");

                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction();
                };

                function scrollFunction() {
                    if (
                        document.body.scrollTop > 20 ||
                        document.documentElement.scrollTop > 20
                    ) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }
                // When the user clicks on the button, scroll to the top of the document
                mybutton.addEventListener("click", backToTop);

                function backToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
<!-- >>>>>>> be2342fd31dd4a1709e816814d2aa45dfff1b09c -->
