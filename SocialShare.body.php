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

        $wgOut->addModules('ext.socialShare');

        $title = $article->getTitle();

        if (
            !MWNamespace::isContent($title->getNamespace())
            || !$wgSocialShareHeader
            || ($title->isMainPage() && !$wgSocialShareMain)
        ) {
            return true;
        }

        $wgOut->setIndicators([
            'share' => SocialShare::socialShareRender($title, $wgSocialShareServicesHeader, true),
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
        global $wgOut,
               $wgSocialShareMain,
               $wgSocialShareSidebar,
               $wgSocialShareServicesSidebar;

        $wgOut->addModules('ext.socialShare');

        $title = $skin->getTitle();

        if (
            !MWNamespace::isContent($title->getNamespace())
            || !$wgSocialShareSidebar
            || ($title->isMainPage() && !$wgSocialShareMain)
        ) {
            return true;
        }

        $bar['share'] = SocialShare::socialShareRender($title, $wgSocialShareServicesSidebar);

        return true;
    }

    /**
     * @param \Title $title
     * @param string $services
     * @param array $query
     *
     * @param bool $prefix
     *
     * @return string
     */
    private static function socialShareRender(Title $title, $services, $prefix = false)
    {
        $buttons = [
            'facebook' => (new SocialShareFacebookButton($title))->render(),
            'twitter' => (new SocialShareTwitterButton($title))->render(),
            'vkontakte' => (new SocialShareVkontakteButton($title))->render(),
            'odnoklassniki' => (new SocialShareOdnoklassnikiButton($title))->render(),
        ];

        $output = '';

        foreach (explode(',', $services) as $service) {
            $output .= isset($buttons[$service]) ? $buttons[$service] : '';
        }

        if ($prefix) {
            $text = wfMessage('share')->plain();
            $output = "<span class=\"social-share-prefix\">$text:</span>" . $output;
        }

        return "<div class=\"social-share\">$output</div>";
    }

}
