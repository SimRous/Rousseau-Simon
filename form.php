 <?php
  include "models/bookmarks.php";

  $actionUrl = "add.php";
  $actionTitle = "Ajout";
  $Id = 0;
  $Title = "";
  $Url = "";
  $Category = "";
  $viewTitle = "Ajout d'un favori";
  $cmdIcon = "fa fa-times";
  $IconTitle = "retour";
  $link = "index.php";

  if (isset($_GET["Id"])) {
    $viewTitle = "Modifier un favori";
    $actionUrl = "update.php";
    $actionTitle = "Modification";
    $Id = (int) $_GET["Id"];
    $bookmark = BookmarksFile()->get($Id);
    if ($bookmark != null) {
      $Title = $bookmark->Title();
      $Url = $bookmark->Url();
      $Category = $bookmark->category();
    }
  }
  $actionTitle .= " de favori";
  $viewContent = <<<HTML
      <form class="form" id="subscribeform" action="$actionUrl" method="POST">
        <input type="hidden" name="id" value="$Id">

        <fieldset>
          <legend>Titre</legend>
          <input class="formControl Alpha" name="Title" placeholder="Titre" 
            required 
            RequireMessage="Veuillez entrer un titre" 
            InvalidMessage="Caractères illégaux" 
            value="$Title"/>
        </fieldset>

        <fieldset>
          <legend>Url</legend>
          <input class="formControl URL" name="Url" placeholder="Url" 
            required
            requireMessage="Veuillez entrer un url"
            InvalidMessage="Url invalide" 
          value="$Url"/>
        </fieldset>

        <fieldset>
          <legend>Categorie</legend>
          <input class="formControl Alpha" name="Category" placeholder="Categorie" 
            required 
            RequireMessage="Veuillez entrer une catégorie" 
            InvalidMessage="Caractères illégaux" 
            value="$Category"/>
        </fieldset>

        <br />
        <input class="formControl" type="submit" value="Soumettre..." />

      </form>
  HTML;
  $viewScript = '<script defer>
  initFormValidation();
  </script>';
  include("View/master.php");
  ?>
