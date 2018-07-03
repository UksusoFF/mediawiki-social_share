<?php

/**
 * @link https://apiok.ru/ext/like
 */
class SocialShareOdnoklassnikiButton extends SocialShareBaseButton
{

    public $name = 'odnoklassniki';

    public function getShare()
    {
        return 'https://connect.ok.ru/offer?' . http_build_query([
                'url' => $this->getLink(),
            ]);
    }

}