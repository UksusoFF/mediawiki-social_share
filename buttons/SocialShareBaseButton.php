<?php

/**
 * @link https://github.com/itgalaxy/ss.js
 */
class SocialShareBaseButton
{

    protected $title;

    public $name = null;

    public function __construct(
        Title $title
    )
    {
        $this->title = $title;
    }

    public function render()
    {
        $attributes = [
            'href' => $this->getShare(),
            'class' => "social-share-link {$this->name}",
            'target' => '_blank',
            'title' => wfMessage("share-{$this->name}")->plain(),
        ];

        $output = '';
        array_walk($attributes, function($item, $key) use (&$output) {
            $output .= " $key=\"$item\"";
        });

        return "<a$output>" . substr($this->name, 0, 1) . "</a>";
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