<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-28 15:33:50
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-03-28 15:35:42
 */

namespace ApiUser\Factory\Controller;

use ApiUser\Controller\User as Controller;
use ApiUser\Service\User as Service;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class User implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Controller(
            $container->get(Service::class)
        );
    }
}
