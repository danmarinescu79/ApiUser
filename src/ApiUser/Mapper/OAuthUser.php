<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-10 14:07:19
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-05-22 18:57:40
 */

namespace ApiUser\Mapper;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Hydrator\ClassMethods;

class OAuthUser implements \ApiBase\Mapper\MapperJsonInterface
{
    private $id;
    private $first_name;
    private $last_name;
    private $created_at;
    private $created_by;
    private $updated_at;
    private $updated_by;
    private $email;
    private $status;

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
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        if (is_object($this->created_by)) {
            return $this->created_by->getId();
        }

        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     *
     * @return self
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedBy()
    {
        if (is_object($this->updated_by)) {
            return $this->updated_by->getId();
        }
        return $this->updated_by;
    }

    /**
     * @param mixed $updated_by
     *
     * @return self
     */
    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
