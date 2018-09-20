<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/20/2018
 * Time: 2:33 PM
 */

namespace Application\Controller\Factory;

/**
 * Logger factory class
 */
class LoggerFactory
{
    /**
     * @var mylogger $mylogger
     */
    public $mylogger;

    /**
    * Constructor method for logger factory class
    */
    public function __construct()
    {
        $logger = $this->loadlogger(LOGGER_TYPE);
        $this->mylogger = $logger->logger;

        return  $this->mylogger;
    }

    /**
    * logger method of factory, this will porvide the dynamic object of requested backend to store log
    * @param string @name
    *
    * @return obj @objLogger
    */
    public function loadlogger($name)
    {
        switch ($name) {
            case 'Database':
                $objLogger = new DBLogger();
                break;
            case 'File':
            default:
                $objLogger = new FileLogger();
                break;
        }

        return $objLogger;
    }
}