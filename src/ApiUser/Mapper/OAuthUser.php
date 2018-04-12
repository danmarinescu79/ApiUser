<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-10 14:07:19
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-12 13:36:10
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
    private $detail;

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
    public function getDetail()
    {
        return $this->detail->extract();
    }

    /**
     * @param mixed $detail
     *
     * @return self
     */
    public function setDetail($detail)
    {
        $this->detail = (new UserDetail($this->objectManager))->hydrate($detail);

        return $this;
    }
}
