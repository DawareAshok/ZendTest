<?php
/**
 * Created by PhpStorm.
 * User: harshadvi
 * Date: 9/20/2018
 * Time: 1:23 PM
 */

namespace Application\Services;

/**
 * Twitter class
 */
class TwitterIntergration
{
    /**
     * Method to login for twitter
     */
    public function doLogin()
    {
        /**
        * We assume $serializedToken is the serialized token retrieved from a database
        * or even $_SESSION 
        */

        $token = unserialize($serializedToken);

        $twitter = new ZendService\Twitter\Twitter(array(
            'accessToken' => $token,
            'oauth_options' => array(
            'username' => 'adaware',
            ),
        ));

        // verify user's credentials with Twitter
        $response = $twitter->account->verifyCredentials();
    }
}