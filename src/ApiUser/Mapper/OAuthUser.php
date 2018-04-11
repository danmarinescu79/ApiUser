<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-10 14:07:19
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 13:27:21
 */

namespace ApiUser\Mapper;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Hydrator\ClassMethods;

class OAuthUser implements \ApiBase\Mapper\MapperJsonInterface
{
    private $id;
    private $name;
    private $email;
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
        $details = $this->doctrineHydrator->extract($data->getDetail());
        unset($details['id']);
        $this->hydrator->hydrate($details, $this);

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
