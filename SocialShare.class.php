<?php

class SocialShare
{

    /**
     * @param \Skin $skin
     * @param array &$bar
     *
     * @return bool
     */
    public static function socialShareSidebar($skin, &$bar)
    {
        global $wgOut,
               $wgSocialShareMain,
               $wgSocialShareSidebar,
               $wgSocialShareHeader,
               $wgSocialShareServicesSidebar,
               $wgSocialShareServicesHeader;

        $title = $skin->getTitle();

        if (
            !MWNamespace::isContent($title->getNamespace())
            || ($title->equals(Title::newMainPage()) && !$wgSocialShareMain)
        ) {
            return true;
        }

        if ($wgSocialShareSidebar) {
            $bar['share'] = SocialShare::socialShareRender($title, $wgSocialShareServicesSidebar, [
                'from' => 'share',
            ]);
        }

        if ($wgSocialShareHeader) {
            $wgOut->setIndicators([
                'share' => SocialShare::socialShareRender($title, $wgSocialShareServicesHeader, [
                    'from' => 'share',
                ]),
            ]);
        }

        return true;
    }

    /**
     * @param \Title $title
     * @param string $services
     * @param array $query
     *
     * @return string
     */
    private static function socialShareRender(Title $title, $services, array $query)
    {
        $buttons = [
            'vkontakte' => (new SocialShareVkontakteButton($title, $query))->render(),
            'facebook' => (new SocialShareFacebookButton($title, $query))->render(),
            'twitter' => (new SocialShareTwitterButton($title, $query))->render(),
            'google' => (new SocialShareGoogleButton($title, $query))->render(),
        ];

        $output = '';

        foreach (explode(',', $services) as $service) {
            $output .= isset($buttons[$service]) ? $buttons[$service] : '';
        }

        return "<div class=\"share\">$output</div>";
    }

}
