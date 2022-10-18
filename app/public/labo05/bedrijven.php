<?php
/**
 * Lab 05 — Start from this version
 * Companies
 * @author <your name>
 */

require_once ('../../vendor/autoload.php');
require_once ('../../config/database.php');
require_once ('../../src/Services/DatabaseConnector.php');

// fetch GET/POST parameters

$moduleAction = isset($_GET['moduleAction']) ? (string) $_GET['moduleAction'] : '';

// connect to database

$connectionParams = [
    'host' => DB_HOST,
    'dbname' => DB_NAME,
    'user' => DB_USER,
    'password' => DB_PASS,
    'driver' => 'pdo_mysql',
    'charset' => 'utf8mb4'
];

$connection = \Services\DatabaseConnector::getConnection($connectionParams);

function showDbError(string $type): void
{
    header('location: error.php?type=db&detail=' . $type);
    exit();
}


try {
    $connection->connect();
} catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
    showDbError('connect');
}

// build SQL query depending on parameters (sort, search)
if ($moduleAction === 'processName'){

}
else {
    $stmtName = $connection->prepare('SELECT * FROM companies');
    $result = $stmtName->executeQuery([]);
    $companies = $result->fetchAllAssociative();
}

// execute query and fetch result

?><!DOCTYPE html>
<html>
<head>
    <title>Voka - bedrijfslijst</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.poptrox.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/util.js"></script>
    <!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
    <script src="js/main.js"></script>
</head>
<body id="top">

<!-- Header -->
<header id="header">
    <h1><a href="#"><strong>voka</strong></a></h1>
    <h1>Vlaams netwerk van ondernemingen</h1>
</header>

<!-- Main -->
<div id="main">
    <!-- Welcome -->
    <section id="welcome">
        <header class="major">
            <h2>Overzicht bedrijven</h2>
        </header>
        <p>Hieronder vindt u een overzicht van alle grote bedrijven in Belgi&euml;.</p>
        <form method="get" action="bedrijven.php">
            <input type="hidden" name="moduleAction" value="processName">
            <div class="row uniform 50%">
                <div class="6u 12u$(xsmall)"></div>
                <div class="3u 12u$(xsmall)">
                    <input type="text" name="search" id="search" value="" placeholder="Zoekterm" />
                </div>
                <div class="3u 12u$(xsmall)">
                    <input type="submit" value="Zoeken" class="special fit small" style="height: 3.4em"/>
                </div>
            </div>
        </form>
        <div class="table-wrapper">
            <table class="alt">
                <thead>
                <tr>
                    <th>Naam &nbsp; <a href="#" style="border-bottom: 0;">&#9660;</a>&nbsp;<a href="#" style="border-bottom: 0;">&#9650;</a></th>
                    <th>Straat en nummer</th>
                    <th>Postcode en gemeente &nbsp; <a href="#" style="border-bottom: 0;">&#9660;</a>&nbsp;<a href="#" style="border-bottom: 0;">&#9650;</a></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($companies as $company) { ?>
                    <tr>
                        <td><?php echo $company['name']; ?></td>
                        <td><?php echo $company['address']; ?></td>
                        <td><?php echo $company['zip'] . ' ' . $company['city']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Footer -->
<footer id="footer">
    <ul class="icons">
        <li><a href="http://www.events.be/" class="icon fa-globe"><span class="label">Website</span></a></li>
        <li><a href="mailto:info@events.be" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
    </ul>
    <ul class="copyright">
        <li>&copy; <a href="http://www.ikdoeict.be/" title="IkDoeICT.be">IkDoeICT.be</a></li>
        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>
</footer>



</body>
</html>