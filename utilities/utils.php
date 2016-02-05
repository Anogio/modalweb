<?php

$page_list = array(
    array(
        "name" => "accueil",
        "title" => "Binet Photo",
        "menutitle" => "Accueil",
        "inmenu" => TRUE),
    array(
        "name" => "galerie",
        "title" => "Galerie d'images du binet photo",
        "menutitle" => "Galerie",
        "inmenu" => TRUE),
    array(
        "name" => "couverture",
        "title" => "Demandes de couverture",
        "menutitle" => "Demande de couverture",
        "inmenu" => TRUE),
    array(
        "name" => "calendrier",
        "title" => "Calendrier des couvertures",
        "menutitle" => "Calendrier",
        "inmenu" => TRUE),
    array(
        "name" => "contact",
        "title" => "Nous contacter",
        "menutitle" => "Nous contacter",
        "inmenu" => TRUE),
    array(
        "name" => "erreur",
        "title" => "Cette page n'est pas accessible",
        "menutitle" => "none",
        "inmenu" => FALSE),
);

function checkPage($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $askedPage) {
            return TRUE;
        }
    }
    return FALSE;
}

function getPageTitle($askedPage) {
    global $page_list;
    foreach ($page_list as $page) {
        if ($page['name'] == $askedPage) {
            return $page['title'];
        }
    }
}

function generateMenu($askedPage) {
    global $page_list;
    echo <<<EOT
    <!-- Static navbar -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
EOT;
    foreach ($page_list as $page) {
        if ($page['inmenu']) {
            $name = $page['name'];
            $menutitle = $page['menutitle'];
            if ($name == $askedPage) {
                echo "<li class='active'><a href='index.php?page=$name'>$menutitle</a></li>";
            } else {
                echo "<li><a href='index.php?page=$name'>$menutitle</a></li>";
            }
        }
    }

    echo <<<EOT
</ul>
            </div>
        </div>
    </div>
EOT;
}

function generateHTMLHeader($title) {
    echo <<<EOT
<html>
    <head>t
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$title</title>
    
        <!-- CSS Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
    
         <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
EOT;
}

function generateHTMLFooter() {
    echo <<<EOT
     <div id="footer">
                <p>Site réalisé en Modal par Antoine Ogier et Agathe Soret</p>
            </div>
 
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>
EOT;
}

?>