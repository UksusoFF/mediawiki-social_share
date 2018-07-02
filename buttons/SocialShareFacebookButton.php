<?php

class SocialShareFacebookButton extends SocialShareBaseButton
{

    public $icon = 'facebook';

    public function getShare()
    {
        return 'https://www.facebook.com/sharer.php?' . http_build_query([
                'u' => $this->getLink(),
            ]);
    }

}