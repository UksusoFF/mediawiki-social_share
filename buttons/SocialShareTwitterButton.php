<?php

class SocialShareTwitterButton extends SocialShareBaseButton
{

    public $icon = 'twitter';

    public function shareLink()
    {
        return 'http://twitter.com/share?' . http_build_query([
                'url' => $this->titleLink(),
                'text' => $this->title->getBaseText(),
            ]);
    }

}