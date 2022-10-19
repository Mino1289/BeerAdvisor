
<link rel="stylesheet" href="./css/header.scss">

<header>
    <div class="menu-container" onclick="changeState(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div id="topnav" class="topnav hide">
        <a href="./index.php">Home</a>
        <a href="./add_beer.php">Add a beer</a>
        <?php
            if(!(isset($_SESSION['ID_user']))){
                echo' <a href="./login.php">Sign in</a>';
                echo' <a href="./register.php">Sign up</a>';
            }
        ?>

    </div>
    <script>
        function changeState(x) {
            x.classList.toggle("change");
            document.getElementById("topnav").classList.toggle("hide");
        }
    </script>

</header>
