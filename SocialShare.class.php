<?php

class SocialShare
{
    /**
     * @param \Article $article
     * @param bool &$outputDone
     * @param bool &$pcache
     *
     * @return bool
     */
    public static function socialShareHeader(&$article, &$outputDone, &$pcache)
    {
        global $wgOut,
               $wgSocialShareMain,
               $wgSocialShareSidebar,
               $wgSocialShareHeader,
               $wgSocialShareServicesSidebar,
               $wgSocialShareServicesHeader;

        if (
            !MWNamespace::isContent($article->getTitle()->getNamespace())
            || !$wgSocialShareHeader
            || (
                $article->getTitle()->equals(Title::newMainPage()) &&
                !$wgSocialShareMain
            )
        ) {
            return true;
        }

        $wgOut->setIndicators([
            'share' => '<div class="share"></div>',
        ]);

        $wgOut->addHTML('Share');

        return true;
    }

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

        if (!$wgSocialShareSidebar) {
            return true;
        }

        $bar['share'] = '<div class="share"></div>';

        return true;
    }
}
