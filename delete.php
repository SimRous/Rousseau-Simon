<?php
include "models/bookmarks.php";
if (isset($_GET["Id"])) {
    $Id = (int) $_GET["Id"];
    BookmarksFile()->remove($Id);
}
header('Location: index.php');