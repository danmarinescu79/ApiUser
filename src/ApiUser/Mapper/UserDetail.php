<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-12 13:31:53
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-12 13:33:39
 */

namespace ApiUser\Mapper;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Hydrator\ClassMethods;

class UserDetail implements \ApiBase\Mapper\MapperJsonInterface
{
    private $id;
    private $firstName;
    private $lastName;

    private $objectManager;
    private $hydrator;
    private $doctrineHydrator;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager    = $objectManager;
        $this->hydrator         = new ClassMethods(true);
        $this->doctrineHydrator = new DoctrineHydrator($objectManager);
    }

    public function hydrate(object $data) : self
    {
        $this->hydrator->hydrate($this->doctrineHydrator->extract($data), $this);

        return $this;
    }

    public function extract() : array
    {
        return $this->hydrator->extract($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     *
     * @return self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     *
     * @return self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }
}
