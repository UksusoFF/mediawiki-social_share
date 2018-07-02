<?php

class SocialShareTwitterButton extends SocialShareBaseButton
{

    public $icon = 'twitter';

    public function getShare()
    {
        return 'https://twitter.com/share?' . http_build_query([
                'url' => $this->getLink(),
                'text' => $this->title->getBaseText(),
            ]);
    }

}