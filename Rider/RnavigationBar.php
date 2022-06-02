<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons CDN Link-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="CSS/RnavigationBar.css">
</head>
<body>
    
    <div class="sidebar">
        <div class="logoContent">
            <div class="logo">
                <div class="logoName">Foody</div>
            </div>

            <i class='bx bx-menu' id="butn"></i>
        </div>

        <ul class="navigation">
            <li>
                <a href="HomePage.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="links">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>            
            </li>

            <li>
                <a href="AdminProfile.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="links">Profile</span>
                </a>
                <span class="tooltip">Profile</span>            
            </li>

            <li>
                <a href="UserList.php">
                    <i class='bx bx-data'></i>
                    <span class="links">Manage User</span>
                </a>
                <span class="tooltip">Manage User</span>            
            </li>

            <li>
                <a href="CalculationMenu.php">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links">Financial</span>
                </a>
                <span class="tooltip">Financial</span>            
            </li>

            <li>
                <a href="Setting.php">
                    <i class='bx bx-cog' id="setting"></i>
                    <span class="links">Setting</span>
                </a>
                <span class="tooltip">Setting</span>            
            </li>

            <li>
                <a href="Login.php">
                    <i class='bx bx-log-out-circle' id="logout"></i>
                    <span class="links">Logout</span>
                </a>
                <span class="tooltip">Logout</span>            
            </li>
        </ul>

        </div>

    </div>

    <script>
        let butn = document.querySelector("#butn");
        let sidebar = document.querySelector(".sidebar");
        
        butn.onclick = function(){
            sidebar.classList.toggle("active");
        }

    </script>

</body>
</html>