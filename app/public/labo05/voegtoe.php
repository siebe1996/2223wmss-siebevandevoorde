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

// connect to database

// when the form has been sent, check parameters, and if ok, store in the DB and redirect

// persist fields in the HTML below

?><!DOCTYPE html>
<html>
<head>
    <title>Voka - bedrijf toevoegen</title>
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
            <h2>Een bedrijf toevoegen</h2>
        </header>
        <ul class="errors">
            <li>Geef een bedrijfsnaam op</li>
            <li>Geef een straat en nummer op</li>
        </ul>
        <div class="row">
            <div class="col-12">
                <form method="post" action="voegtoe.php">
                    <input type="hidden" name="action" value="addCompany">
                    <div class="row gtr-uniform gtr-50">
                        <div class="col-12"><input type="text" name="name" id="name" placeholder="bedrijfsnaam" /></div>
                        <div class="col-12"><input type="text" name="address" id="address" placeholder="straat en nummer" /></div>
                        <div class="col-6"><input type="text" name="zip" id="zip" placeholder="postcode" /></div>
                        <div class="col-6"><input type="text" name="city" id="city" placeholder="gemeente" /></div>
                        <div class="col-12"><textarea name="activity" id="activity" placeholder="activiteiten" rows="2"></textarea></div>
                        <div class="col-12"><input type="text" name="vat" id="vat" placeholder="btw-nummer" /></div>
                    </div>

                    <ul class="actions">
                        <li><input type="submit" value="Versturen" /></li>
                    </ul>
                </form>
            </div>
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