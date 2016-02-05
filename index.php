<!DOCTYPE html>
<?php
require('utilities/utils.php');
if (array_key_exists('page', $_GET)) {
    $askedPage = $_GET['page'];
} else {
    $askedPage = "accueil";
}
$authorized=checkPage($askedPage);
if($authorized){
    $pageTitle=  getPageTitle($askedPage);
}
else{
    $pageTitle="Cette page n'est pas accessible";
    $askedPage="erreur";
}
generateHTMLHeader($pageTitle);
?>
<div class="container">
<?php generateMenu($askedPage); ?>

    <div class="jumbotron">
        <?php echo "<h1>$pageTitle</h1>"; ?>
        <p>Ceci est le site du binet photo</p>
    </div>
    <div id="content">
        <?php
        if($authorized)
        {
        require 'content/content_'.$askedPage.".php";
        }
        else
        {
            require 'content/erreur.php';
        }
        ?>
    </div>

    <?php
    generateHTMLFooter();
    ?>