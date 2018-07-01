<?php

class SocialShareBaseButton
{

    protected $title;

    public $icon = null;

    public function __construct(
        Title $title
    )
    {
        $this->title = $title;
    }

    public function render()
    {
        return '<a href="' . $this->shareLink() . '" class="social-share-link ' . $this->icon . '" target="_blank">' . substr($this->icon, 0, 1) . '</a>';
    }

    public function shareLink()
    {
        return null;
    }

    public function titleLink()
    {
        return $this->title->getFullURL();
    }

}