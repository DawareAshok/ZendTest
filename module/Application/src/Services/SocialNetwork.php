<?php

/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/20/2018
 * Time: 1:21 PM
 */

namespace Application\Services;

/**
 * Social network factory class
 */
class SocialNetwork
{
    /**
    * loadSocialNetwork method of factory, this will porvide the dynamic object of requested social network for login
    * @param string @name
    *
    * @return obj @objSocial
    */
    public function loadSocialNetwork($name)
    {
        $objSocial = null;
        switch ($name) {
            case 'FaceBook':
                $objSocial = new FacebookIntergration();
                break;
            case 'Twitter':
                $objSocial = new TwitterIntergration();
                break;
            default:
                echo "Unable to load social network";
                break;
        }

        return $objSocial;
    }
}