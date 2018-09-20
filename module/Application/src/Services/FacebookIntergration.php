<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/20/2018
 * Time: 1:23 PM
 */

namespace Application\Services;

/**
 * Class FacebookIntergration
 * @package Application\Services
 */
class FacebookIntergration
{
    /**
     * $token
     */
    private $token = null;

    /**
     * $user
     */
    private $user = null;

    /**
     * Constructor Method
     */
    public function __construct($token) {
        $this->token = $token;
    }

    /**
     * Method to get user
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Method to login for facebook
     */
    public function doLogin()
    {
        $token = $this->getRequest()->getParam('token', false);
        if($token == false) {
            return false;
        }

        $auth = Zend_Auth::getInstance();
        $adapter = new Zend_Auth_Adapter_Facebook($token);
        $result = $auth->authenticate($adapter);
        if($result->isValid()) {
            $user = $adapter->getUser();
            $auth->getStorage()->write($user);

            return true;
        }

        return false;
    }
}