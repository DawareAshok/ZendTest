<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/19/2018
 * Time: 1:05 PM
 */

namespace Application\Model;
use DomainException;
use Application\Model\ProfilesRepositoryInterface;

class ProfilesRepository implements ProfilesRepositoryInterface
{
    private $data = [
        1 => [
            'id'    => 1,
            'profile_name' => 'Hello World #1',
            'description'  => 'This is our first blog post!',
        ]
    ];

    /**
     * {@inheritDoc}
     */
    public function findAllProfiles()
    {
        return array_map(function ($post) {
            return new Profiles(
                $post['profile_name'],
                $post['description'],
                $post['id']
            );
        }, $this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function findProfile($id)
    {
        if (! isset($this->data[$id])) {
            throw new DomainException(sprintf('Profiles by id "%s" not found', $id));
        }
        return new Profiles(
            $this->data[$id]['profile_name'],
            $this->data[$id]['description'],
            $this->data[$id]['id']
        );
    }

}