<?php
    include "models/bookmarks.php";
    BookmarksFile()->update(new Bookmark($_POST));
    header('Location: index.php');