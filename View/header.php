<?php
if (!isset($viewTitle))
    $viewTitle = "";
if (!isset($categorySelector))
    $categorySelector = "";
if (!isset($cmdIcon)){
    $cmdIcon = "";
}
if (!isset($link))
$link = "";
if (!isset($IconTitle))
$IconTitle = "";


$viewHead = <<< HTML
        <div id="header">
            <h3>$viewTitle</h3>
                  $categorySelector
            <a href="$link" class="cmdIcon $cmdIcon" title="$IconTitle"></a>
        </div>
HTML;