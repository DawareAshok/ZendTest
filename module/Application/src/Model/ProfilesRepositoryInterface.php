<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/19/2018
 * Time: 1:04 PM
 */

namespace Application\Model;

interface  ProfilesRepositoryInterface
{
    public function findAllProfiles();
    public function findProfile($id);
}