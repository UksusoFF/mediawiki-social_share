<?php

/**
 * @link https://github.com/itgalaxy/ss.js
 */
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
        return '<a href="' . $this->getShare() . '" class="social-share-link ' . $this->icon . '" target="_blank">' . substr($this->icon, 0, 1) . '</a>';
    }

    public function getShare()
    {
        return null;
    }

    public function getLink()
    {
        return $this->title->getFullURL();
    }

}