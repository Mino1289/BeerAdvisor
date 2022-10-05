<link rel="stylesheet" href="./css/header.css">
<header>
    <div class="menu-container" onclick="changeState(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div id="topnav" class="topnav hide">
        <a href="./index.php">Home</a>
        <a href="./login.php">Sign In</a>
        <a href="./register.php">Sign Up</a>
    </div>
    <script>
        function changeState(x) {
            x.classList.toggle("change");
            document.getElementById("topnav").classList.toggle("hide");
        }
    </script>

</header>