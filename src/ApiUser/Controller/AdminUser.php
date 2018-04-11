<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:29
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 13:23:58
 */

namespace ApiUser\Controller;

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

    public function getList()
    {
        $users = $this->service->getPaginatedUsers($this->params());
        return new JsonModel($users);
    }

    public function get($id)
    {
        $user = $this->service->getUser($id);
        return new JsonModel($user);
    }

    public function create($data)
    {
        return new JsonModel([]);
    }

    public function update($id, $data)
    {
        return new JsonModel([]);
    }
}
