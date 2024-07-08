<?php
@session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 
} else {
    $username = 'user';
}
?>

<style>
    body, h1, h2, h3, h4, h5, h6, p, ul, ol, li {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-image:
    }

    .navbar {
        background-color: #191919;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 80px;
        display: flex;
        align-items: center;
        padding: 0 10px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 999;
    }

    .logo img {
        max-height: 80px;
        margin-right: 0px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        align-items: center;
        margin-left: 20px;
    }

    .nav-links li {
        margin-left: 10px;
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .nav-links li a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        transition: color 0.3s ease;
        padding: 10px 12px;
    }

    

    .logout-btn {
        margin-left: 1400px;
    }

    .logout-btn img {
        height: 60px;
        vertical-align: middle;
        margin-right: 20px;
    }

    .logout-btn a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
</style>

<nav class="navbar">
    <div class="logo">
        <a href="tshirt.php"><img src="img/gertes_logo.jpg" alt="Logo"></a>
    </div>
    <ul class="nav-links">
    <li><a href="tshirt.php">Tshirts</a></li>
    <li><a href="hoodies.php">Hoodies</a></li>
    <li><a href="pants.php">Pants</a></li>
        <li><?php echo $username; ?></li>
    </ul>
    <ul>
    <li class="logout-btn">
            <a href="logout_process.php">
                <img src="img/logout.png" alt="Logout">
            </a>
        </li>
    </ul>
</nav>
