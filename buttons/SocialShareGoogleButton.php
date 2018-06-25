<?php

class SocialShareGoogleButton extends SocialShareBaseButton
{

    public $icon = 'google';

    public function shareLink()
    {
        return 'https://plusone.google.com/_/+1/confirm?' . http_build_query([
                'url' => $this->titleLink(),
            ]);
    }

}