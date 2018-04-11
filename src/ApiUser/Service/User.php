<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:58
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 13:23:29
 */

namespace ApiUser\Service;

use ApiBase\Entity\OAuthUser as UserEntity;
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
        $data   = $this->objectManager->getRepository(UserEntity::class)->getPaginated($params);
        return $mapper->map($data, \ApiUser\Mapper\OAuthUser::class);
    }

    public function getUser($id)
    {
        $mapper = new \ApiBase\Mapper\ToJson($this->objectManager);
        $data   = $this->objectManager->getRepository(UserEntity::class)->findOneBy(['id' => $id]);
        return $mapper->map($data, \ApiUser\Mapper\OAuthUser::class);
    }
}
