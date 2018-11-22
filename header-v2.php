<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <title><?php echo (!empty($title) ?  $title :  'Potfolio')?></title>
</head>

<body class="pagina">
<div class="mobil-navbar-container">
    <div class="mobile-navbar-hamburger-container">
        <i id="m-navbar-menu-icon" class="fas fa-bars"></i>
    </div>
    <nav id="mobile-navbar" class="mobile-navbar">
        <ul>
            <li>
                <a href="index.php">
                    Home
                </a>
            </li>
            <li>
                <a href="work2.php">
                    Work
                </a>
            </li>
            <li>
                <a href="about5.php">
                    About
                </a>
            </li>
            <li>
                <a href="service-list.php">
                    Services
                </a>
            </li>
            <li>
                <a href="contact.php">
                    Contact Me
                </a>
            </li>
        </ul>
    </nav>
</div>
<header id="header-v2" class="header">
    <div class="header-main-container header-overlay">
        <div class="header-image-container">
            <img src="assets/new_assets/Headshot1.gif" class="header-image" alt="Header Image">
        </div>
        <div class="header-text">
            <div>
                <div>
                    <span>Matt Halligan</span>
                </div>
                <div style="text-align: center;">
                    <span>Burlington, VT</span> | <span>University of Vermont</span>
                </div>
            </div>
        </div>
    </div>
</header>

<nav id="navbarv2" class="navbar">
    <ul>
        <li>
            <a href="index.php">
                Home
            </a>
        </li>
        <li>
            <a href="work2.php">
                Work
            </a>
        </li>
        <li>
            <a href="about5.php">
                About
            </a>
        </li>
        <li class="">
            <a href="service-list.php">
                Services
            </a>
        </li>
        <li>
            <a href="contact.php">
                Contact Me
            </a>
        </li>
    </ul>
</nav>