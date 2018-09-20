<?php

/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/19/2018
 * Time: 1:01 PM
 */
namespace Application\Model;

class Profiles
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $profile_name;
    /**
     * @var string
     */
    private $description;
    /**
     * @param string $title
     * @param string $text
     * @param int|null $id
     */
    public function __construct($profile_name, $description, $id = null)
    {
        $this->profile_name = $profile_name;
        $this->description = $description;
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getProfileName()
    {
        return $this->profile_name;
    }

    /**
     * @param string $profile_name
     */
    public function setProfileName($profile_name)
    {
        $this->profile_name = $profile_name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}