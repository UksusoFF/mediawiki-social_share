<?php

class SocialShare
{

    /**
     * @param \Article $article
     * @param bool $outputDone
     * @param bool $pcache
     *
     * @return bool
     */
    public static function onArticleViewHeader(Article &$article, &$outputDone, &$pcache)
    {
        global $wgOut,
               $wgSocialShareMain,
               $wgSocialShareHeader,
               $wgSocialShareServicesHeader;

        $title = $article->getTitle();

        if (
            !MWNamespace::isContent($title->getNamespace())
            || !$wgSocialShareHeader
            || ($title->equals(Title::newMainPage()) && !$wgSocialShareMain)
        ) {
            return true;
        }

        $wgOut->setIndicators([
            'share' => SocialShare::socialShareRender($title, $wgSocialShareServicesHeader, [
                'from' => 'share',
            ]),
        ]);

        return true;
    }

    /**
     * @param \Skin $skin
     * @param array &$bar
     *
     * @return bool
     */
    public static function onSkinBuildSidebar(Skin $skin, &$bar)
    {
        global $wgSocialShareMain,
               $wgSocialShareSidebar,
               $wgSocialShareServicesSidebar;

        $title = $skin->getTitle();

        if (
            !MWNamespace::isContent($title->getNamespace())
            || !$wgSocialShareSidebar
            || ($title->equals(Title::newMainPage()) && !$wgSocialShareMain)
        ) {
            return true;
        }

        $bar['share'] = SocialShare::socialShareRender($title, $wgSocialShareServicesSidebar, [
            'from' => 'share',
        ]);

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
            'facebook' => (new SocialShareFacebookButton($title, $query))->render(),
            'google' => (new SocialShareGoogleButton($title, $query))->render(),
            'twitter' => (new SocialShareTwitterButton($title, $query))->render(),
            'vkontakte' => (new SocialShareVkontakteButton($title, $query))->render(),
        ];

        $output = '';

        foreach (explode(',', $services) as $service) {
            $output .= isset($buttons[$service]) ? $buttons[$service] : '';
        }

        return "<div class=\"share\">$output</div>";
    }

}