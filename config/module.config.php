<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-22 16:18:54
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 13:24:35
 */

namespace ApiUser;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'admin-user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin/user[/:id]',
                    'defaults' => [
                        'controller' => Controller\AdminUser::class,
                    ],
                ],
            ],
            'account' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/account',
                    'defaults' => [
                        'controller' => Controller\User::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\User::class      => Factory\Controller\User::class,
            Controller\AdminUser::class => Factory\Controller\AdminUser::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\User::class => Factory\Service\User::class,
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ],
            ],
        ],
    ],
];
