<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:29
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 15:11:22
 */

namespace ApiUser\Controller;

use ApiBase\Entity\OAuthUser as Entity;
use ApiUser\Service\User as Service;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AdminUser extends AbstractRestfulController
{
    private $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getList() : JsonModel
    {
        $users = $this->service->getPaginatedUsers($this->params());
        return new JsonModel($users);
    }

    public function get($id) : JsonModel
    {
        $user = $this->service->getUser($id);
        return new JsonModel($user);
    }

    public function create($data) : JsonModel
    {
        $entity = new Entity();
        return $this->manage($entity, $data);
    }

    public function update($id, $data) : JsonModel
    {
        $entity = $this->service->getOne($id);
        return $this->manage($entity, $data);
    }

    private function manage(Entity $entity, array $data) : JsonModel
    {
        $data['id'] = $entity->getId();
        
        $form = $this->service->getForm();
        $form->bind($entity);
        $form->setData(['oauth_user' => $data]);

        if ($form->isValid()) {
            $this->service->save($entity);
            return $this->get($entity->getId());
        } else {
            return new JsonModel($form->getMessages());
        }
        return new JsonModel([]);
    }
}
