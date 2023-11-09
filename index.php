<?php
        include_once "models/bookmarks.php";
        include_once "HtmlHelpers.php";
        $viewTitle = "Liste de favoris";
        session_start();

        if (!isset($_SESSION["category"]))
            $_SESSION["category"] = "";

        if (isset($_GET["category"])) {
            $_SESSION["category"] = $_GET["category"];
        }
        $selectedCategory = $_SESSION["category"];

        $bookmarks = BookmarksFile()->toArray();
        $categories = [];
        foreach ($bookmarks as $bookmark) {
            if (!in_array($bookmark->Category, $categories))
                array_push($categories, $bookmark->Category);
        }
        $categorySelector = HtmlHelper::ComboBox("Categories-Combobox", "Toutes les catégories", $categories, $selectedCategory);
        $bookmarks = BookmarksFile()->toArray();
        $viewContent = "";
        $link = "form.php";
        $IconTitle = "Ajouter un favoris";
        $cmdIcon = "fa fa-plus";
            foreach ($bookmarks as $bookmark) {
                if ($selectedCategory == "Toutes les catégories" || $bookmark->Category == $selectedCategory) {
                    $id = $bookmark->Id();
                    $title = $bookmark->Title();
                    $url = $bookmark->Url();
                    $category = $bookmark->Category();
                    $favicon = HtmlHelper::SiteFavicon($url);
                    $bookmarkLink = HtmlHelper::Link($url, $favicon, true);
                    
                    $viewContent .= <<<HTML
                        <div class="dataRow">
                            <div class="dataContainer noselect">
                                <div class="dataLayout">
                                    $bookmarkLink
                                    <span class="bookmarkTitle">$title</span>
                                    <span class="bookmarkCategory">$category</span>
                                </div>
                                <div class="dataCommandPanel">
                                    <a href="form.php?Id=$id"          class="cmdIcon fa fa-pencil" title="Modifier $title"></a>
                                    <a href="confirmDelete.php?Id=$id" class="cmdIcon fa fa-trash"  title="Effacer $title"></a>
                                </div>
                            </div>
                        </div>
                    HTML;
                }
            }
            $viewScript = '<script defer>
            $("#Categories-Combobox").on("change", function () {
                window.location.replace("index.php?category=" + $("#Categories-Combobox option:selected").text());
            });
             </script>';
            include("View/master.php");
            ?>
