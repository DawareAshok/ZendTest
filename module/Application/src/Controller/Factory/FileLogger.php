<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/20/2018
 * Time: 2:33 PM
 */

namespace Application\Controller\Factory;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

/**
 * File logger class
 */
class FileLogger
{
    /**
    * Constructor method for file logger class
    */
    public function __construct()
    {
        $this->logger = new Logger;
        $writer = new Stream(ROOT_PATH . '/data/logs/log.txt', 'a+');
        $this->logger->addWriter($writer);

        return $this->logger;
    }
}