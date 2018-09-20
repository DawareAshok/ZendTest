<?php
/**
 * Index controller
 */

namespace Application\Controller;

use Application\Services\SocialNetwork;
use Application\Controller\Factory\LoggerFactory;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Model\ProfilesRepositoryInterface;
use Application\Services\FacebookIntergration;
use Zend\View\Model\ViewModel;
use InvalidArgumentException;
use Zend\Log\Logger;

class IndexController extends AbstractActionController
{
    /**
     * @var ProfilesRepositoryInterface
     */
    private $profilesRepository;

    /**
     * @var LoggerFactory
     */
    private $logger;

    /**
     * @var SocialNetwork
     */
    private $social;

    /**
     * Constructor method for index controller
     * @param ProfilesRepositoryInterface $profilesRepository
     * @param LoggerFactory $logger
     */
    public function __construct(ProfilesRepositoryInterface $profilesRepository, LoggerFactory $logger)
    {
        $this->profilesRepository = $profilesRepository;
        $this->social = new SocialNetwork();
        $this->logger = $logger->mylogger;
    }

    /**
     * Index method loads profiles data from database
     *
     * @return array 
     */
    public function indexAction()
    {
        $this->logger->log(Logger::INFO, 'Fetching profile details');

        return [
            'profiles' => $this->profilesRepository->findAllProfiles(),
        ];
    }

    /**
     * Method for login to social networks
     *
     * @return array 
     */
    public function loginAction()
    {
        $this->logger->log(Logger::INFO, 'Login method call.');
        $objSocial = $this->social->loadSocialNetwork(SOCIAL_NETWORK_TYPE);
        $objSocial->doLogin();
    }
}
