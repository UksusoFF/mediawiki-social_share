<?php

/**
 * @link https://developers.google.com/+/web/share/
 */
class SocialShareGoogleButton extends SocialShareBaseButton
{

    public $icon = 'google';

    public function getShare()
    {
        return 'https://plus.google.com/share?' . http_build_query([
                'url' => $this->getLink(),
            ]);
    }

}