<?php

class SocialShareTwitterButton extends SocialShareBaseButton
{

    public $name = 'twitter';

    public function getShare()
    {
        return 'https://twitter.com/share?' . http_build_query([
                'url' => $this->getLink(),
                'text' => $this->title->getBaseText(),
            ]);
    }

}