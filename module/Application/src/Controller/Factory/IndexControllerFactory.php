<?php
/**
 * Created by PhpStorm.
 * User: adawaare
 * Date: 9/19/2018
 * Time: 1:11 PM
 */
 
namespace Application\Controller\Factory;
use Application\Controller\IndexController;
use Application\Model\ProfilesRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Controller\Factory\LoggerFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\DispatchableInterface;

class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ListController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IndexController(
            $container->get(ProfilesRepositoryInterface::class),
            new LoggerFactory()
        );
    }
}