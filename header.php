
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
            } else if($_SESSION['ID_user'] == 1) {
                // admin logged in
                echo '<a href="./panel.php">Panel</a>';
            }
        ?>

    </div>

    <?php

        if(isset($_SESSION['ID_user']))
        {

            $img = base64_encode($_SESSION['profile_picture']);
            echo '<a href="user.php?id='.$_SESSION['ID_user'].'">';
            echo '<img id="pdp" alt="profile_picture" src="data:image/png;base64,'.$img.'" />';
            echo '</a>';

        }
        else
        {
            echo '<a href="register.php"><img id="pdp" alt="profile_picture" src="img/2754.png"/></a>';
        }
    ?>

    <script>
        function changeState(x) {
            x.classList.toggle("change");
            document.getElementById("topnav").classList.toggle("hide");
        }
    </script>

</header>
