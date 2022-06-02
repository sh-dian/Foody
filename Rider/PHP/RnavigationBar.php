<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Boxicons CDN Link-->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
        <link rel="stylesheet" href="NewMainPage.css">
    </head>
    <body>
        <div class="sidebar">
            <div class="logoContent">
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
                <a href="History.php">
                    <i class='bx bxs-circle'></i>
                    <span class="links">History</span>
                </a>
                    <span class="tooltip">History</span>
            </li>

            <li>
                <a href="Commision.php">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links">Commission</span>
                </a>
                    <span class="tooltip">Commission</span>
            </li>

            <li>
                <a href="RiderProfile.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="links">Edit</span>
                </a>
                    <span class="tooltip">Edit</span>
            </li>
        </ul>

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