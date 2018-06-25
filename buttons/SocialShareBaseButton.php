<?php

class SocialShareBaseButton
{

    protected $title;
    protected $query;

    public $icon = null;

    public function __construct(
        Title $title,
        $query
    )
    {
        $this->title = $title;
        $this->query = $query;
    }

    public function render()
    {
        return '<a href="' . $this->shareLink() . '" class="social-share-link ' . $this->icon . '" target="_blank"></a>';
    }

    public function shareLink()
    {
        return null;
    }

    public function titleLink()
    {
        return $this->title->getLinkURL($this->query);
    }

}