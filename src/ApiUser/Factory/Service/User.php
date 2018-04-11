<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:54
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-03-28 15:36:42
 */

namespace ApiUser\Factory\Service;

use ApiUser\Service\User as Service;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class User implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Service(
            $container->get(EntityManager::class)
        );
    }
}
