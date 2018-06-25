<?php

class SocialShareVkontakteButton extends SocialShareBaseButton
{

    public $icon = 'vkontakte';

    public function shareLink()
    {
        return 'https://vk.com/share.php?' . http_build_query([
                'url' => $this->titleLink(),
            ]);
    }

}