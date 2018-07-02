<?php

/**
 * @link https://vk.com/dev.php?method=widget_share
 */
class SocialShareVkontakteButton extends SocialShareBaseButton
{

    public $icon = 'vkontakte';

    public function getShare()
    {
        return 'https://vk.com/share.php?' . http_build_query([
                'url' => $this->getLink(),
            ]);
    }

}