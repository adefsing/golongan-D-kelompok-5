<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PacVic WEB</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--header-->
    <header>
        <a href="?page" id="logo">
            <h1>
                #poemlt
            </h1>
            <h2>
                Express Yor Feelings Here
            </h2>
        </a>

        <nav>
            <ul>
                <li><a href="?page">Home</a></li>
                <li><a href="?page=about">About</a></li>
                <li><a href="?page=contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- bagian untama -->
    <section>
        
        <?php
	error_reporting(0);
	switch ($_GET['page']) {
        case 'contact':
			include "contact.php";
			break;
        case 'about':
			include "about.php";
			break;
		default:
			include "home.php";
			break;
				}
	?>
    </section>

    <!-- footer -->
    <footer>
        <div class="social">
            <ul>
                <li><img src="img/fb.png" alt="facebook"></li>
                <li><img src="img/twitter.jpg" alt="twitter"></li>
            </ul>
        </div>
        <p>&copy; Copyright 2019 Hello Pakvic</p>
    </footer>

</body>

</html>