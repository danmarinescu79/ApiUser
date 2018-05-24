<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:58
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-05-24 14:09:27
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

    public function getForm(bool $allowEmpty = false)
    {
        return new \ApiUser\Form\User($this->objectManager, $allowEmpty);
    }

    public function save(Entity $entity)
    {
        $this->objectManager->persist($entity);
        $this->objectManager->flush();
        return $entity;
    }
}
