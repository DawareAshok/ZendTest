<?php
/**
 * Created by PhpStorm.
 * User: adaware
 * Date: 9/19/2018
 * Time: 1:21 PM
 */

namespace Application\Model;

use InvalidArgumentException;
use RuntimeException;
use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;

class ZendDbSqlRepository implements ProfilesRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;
    /**
     * @var
     */
    private $hydrator;
    /**
     * @var
     */
    private $profilesPrototype;

    /**
     * ZendDbSqlRepository constructor.
     * @param AdapterInterface $db
     * @param HydratorInterface $hydrator
     * @param Profiles $profilesPrototype
     */
    public function __construct(
        AdapterInterface $db,
        HydratorInterface $hydrator,
        Profiles $profilesPrototype
    )
    {
        $this->db = $db;
        $this->hydrator = $hydrator;
        $this->profilesPrototype = $profilesPrototype;
    }

    /**
     * @return array|HydratingResultSet
     */
    public function findAllProfiles()
    {
        $sql = new Sql($this->db);
        $select = $sql->select('profiles');
        $stmt = $sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute();
        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            return [];
        }
        $resultSet = new HydratingResultSet($this->hydrator, $this->profilesPrototype);
        $resultSet->initialize($result);

        return $resultSet;
    }

    /**
     * @param $id
     * @return object
     */
    public function findProfile($id)
    {
        $sql = new Sql($this->db);
        $select = $sql->select('profiles');
        $select->where(['id = ?' => $id]);
        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        if (!$result instanceof ResultInterface || !$result->isQueryResult()) {
            throw new RuntimeException(sprintf(
                'Failed retrieving blog post with identifier "%s"; unknown database error.',
                $id
            ));
        }
        $resultSet = new HydratingResultSet($this->hydrator, $this->profilesPrototype);
        $resultSet->initialize($result);
        $post = $resultSet->current();
        if (!$post) {
            throw new InvalidArgumentException(sprintf(
                'Blog post with identifier "%s" not found.',
                $id
            ));
        }

        return $post;
    }

    /**
     * @param $name
     * @param $arguments
     */
    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}