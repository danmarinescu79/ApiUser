<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-11 14:26:40
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-05-22 23:57:02
 */

namespace ApiUser\Form;

use ApiBase\Form\Fieldset\OAuthUser as UserFieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class User extends Form
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('user');

        $this->setHydrator(new DoctrineHydrator($objectManager));

        $fieldset = new UserFieldset($objectManager);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

        $this->setValidationGroup([
            'oauth_user' => [
                'id',
                'last_name',
                'first_name',
                'email',
                'password',
                'verify_password',
            ],
        ]);
    }
}
