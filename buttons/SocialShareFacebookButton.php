<?php

class SocialShareFacebookButton extends SocialShareBaseButton
{

    public $icon = 'facebook';

    public function shareLink()
    {
        return 'https://www.facebook.com/sharer.php?' . http_build_query([
                'u' => $this->titleLink(),
            ]);
    }

}