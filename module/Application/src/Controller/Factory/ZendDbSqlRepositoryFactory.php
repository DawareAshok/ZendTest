<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/19/2018
 * Time: 1:20 PM
 */

namespace Application\Controller\Factory;


use Application\Model\Profiles;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Application\Model\ZendDbSqlRepository;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\Reflection as ReflectionHydrator;

class ZendDbSqlRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ZendDbSqlRepository(
            $container->get(AdapterInterface::class),
            new ReflectionHydrator(),
            new Profiles('', '')
        );
    }
}