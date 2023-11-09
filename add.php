<?php
    include_once "models/bookmarks.php";
    BookmarksFile()->add(new Bookmark($_POST));
    header('Location: index.php');
