<?php
    include "models/bookmarks.php";
    include_once "HtmlHelpers.php";
    $Id = 0;
    $Title = "";
    $Url = "";
    $Category = "";
    $favicon = "";
    $viewTitle = "Supprimer";
    if (isset($_GET["Id"])) {
        $Id = (int) $_GET["Id"];
        $bookmark = BookmarksFile()->get($Id);
        if ($bookmark != null) {
            $Title = $bookmark->Title();
            $Url = $bookmark->Url();
            $Category = $bookmark->Category();
            $favicon = HtmlHelper::SiteFavicon($Url);
        } else
            header('Location: index.php');
    } else
        header('Location: index.php');

    $viewContent = <<<HTML
        <div class="dataDeleteForm">
            <h4>Effacer le favori suivant?</h4>
            <br>
            <div class="dataRow">
                <div class="dataContainer">
                <div class="dataLayout">
                    $favicon
                    <span class="bookmarkTitle">$Title</span>
                    <span class="bookmarkCategory">$Category</span>
                </div>
            </div>   
            <br>
            <a href="delete.php?Id=$Id">
                <input type="button" value="Effacer" class="btn btn-primary">
            </a>
            <a href="index.php">
                <input type="button" value="Annuler" class="btn btn-secondary">
            </a>
        </div>    
    HTML;
    include("View/master.php");
    ?>