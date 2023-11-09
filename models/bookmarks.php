<?php

include_once 'records.php';

class Bookmark extends Record
{
    public $Title = "";
    public $Url = "";
    public $Category = "";


    public function Title()
    {
        return $this->Title;
    }
    public function Url()
    {
        return $this->Url;
    }
    public function Category()
    {
        return $this->Category;
    }


    public function setTitle($value)
    {
        if (is_string($value))
            $this->Title = $value;
    }
    public function setUrl($value)
    {
        if (is_string($value))
            $this->Url = $value;
    }
    public function setCategory($value)
    {
        if (is_string($value))
            $this->Category = $value;
    }
public static function compare($bookmark_a, $bookmark_b)
{
    $compCat = strcmp($bookmark_a->Category(), $bookmark_b->Category());
    if ($compCat == 0)
        return strcmp($bookmark_a->Title(), $bookmark_b->Title());
    return $compCat;
}
}

class Bookmarks extends Records
{
}

function BookmarksFile()
{
    return new Bookmarks('data/bookmarks.data');
}