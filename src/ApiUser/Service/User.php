<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:58
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 15:05:25
 */

namespace ApiUser\Service;

use ApiBase\Entity\OAuthUser as Entity;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Mvc\Controller\Plugin\Params;

class User
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function getPaginatedUsers(Params $params)
    {
        $mapper = new \ApiBase\Mapper\ToJson($this->objectManager);
        $data   = $this->objectManager->getRepository(Entity::class)->getPaginated($params);
        return $mapper->map($data, \ApiUser\Mapper\OAuthUser::class);
    }

    public function getOne($id)
    {
        return $this->objectManager->getRepository(Entity::class)->findOneBy(['id' => $id]);
    }

    public function getUser($id)
    {
        $mapper = new \ApiBase\Mapper\ToJson($this->objectManager);
        $data   = $this->getOne($id);
        return $mapper->map($data, \ApiUser\Mapper\OAuthUser::class);
    }

    public function getForm()
    {
        return new \ApiUser\Form\User($this->objectManager);
    }

    public function save(Entity $entity)
    {
        $this->objectManager->persist($entity);
        $this->objectManager->flush();
        return $entity;
    }
}
