<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons CDN Link-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="RnavigationBar.css">
</head>
<body>
    
    <div class="sidebar">
        <div class="Content">
            <div class="logo">
                <div class="logo_name">Foody</div>
            </div>

            <i class='bx bx-menu' id="butn"></i>
        </div>

        <ul class="navigation">
            <li>
                <a href="RProfil.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="links">Profile</span>
                </a>
                <span class="tooltip">Profile</span>            
            </li>

            <li>
                <a href="RCommission.php">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links">Commission</span>
                </a>
                <span class="tooltip">Commission</span>            
            </li>

            <li>
                <a href="RHistory.php">
                    <i class='bx bx-cog' id="history"></i>
                    <span class="links">History</span>
                </a>
                <span class="tooltip">History</span>            
            </li>

            <li>
                <a href="RLogin.php">
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