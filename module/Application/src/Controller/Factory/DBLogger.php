<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/20/2018
 * Time: 2:34 PM
 */

namespace Application\Controller\Factory;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\Log\Writer;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Log\Formatter;

/**
 * database logger class
 */
class DBLogger
{
    /**
    * Constructor method for DB logger class
    */
    public function __construct()
    {
        $mapping = [
            'timestamp' => 'date',
            'priority'  => 'type',
            'message'   => 'message',
        ];

        $db = new DbAdapter([
            'driver'   => 'Pdo_mysql',
            'dsn'      => 'mysql:dbname=zf2_test;host=localhost;',
            'username' => 'root',
            'password' => ''
        ]);

        $writerDb = new Writer\Db($db, 'log', $mapping);

        $formatter = new Formatter\Base();
        $formatter->setDateTimeFormat('Y-m-d H:i:s');
        $writerDb->setFormatter($formatter);

        $this->logger = new Logger;
        $this->logger->addWriter($writerDb);

        return $this->logger;
    }
}