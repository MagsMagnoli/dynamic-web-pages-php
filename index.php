<!DOCTYPE html>
<html>

<head></head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?p=about">About</a></li>
            <li><a href="index.php?p=contact">Contact</a></li>
            <li><a href="index.php?p=share">Share</a></li>
        </ul>
    </nav>

    <main>
        <?php
        // location to check for pages
        $pagesDir = 'pages';
        // if page query param
        if (!empty($_GET['p'])) {
            $pagesFolder = scandir($pagesDir);
            // remove current directory (.) and previous directory (..)
            unset($pagesFolder[0], $pagesFolder[1]);
            $page = $_GET['p'];
            // if valid page
            if (in_array("$page.inc.php", $pagesFolder)) {
                include("$pagesDir/$page.inc.php");
            } else {
                // show not found
                echo '<h1>You are lost</h1>';
                echo '<h2>Page not found</h2>';
            }
        } else {
            // show default page
            include("$pagesDir/home.inc.php");
        }
        ?>
    </main>
</body>

</html>