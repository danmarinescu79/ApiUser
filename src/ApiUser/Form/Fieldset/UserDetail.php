<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-04-11 14:17:05
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-11 14:46:25
 */

namespace ApiUser\Form\Fieldset;

use ApiUser\Entity\UserDetail as Entity;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class UserDetail extends Fieldset implements InputFilterProviderInterface
{
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('detail');

        $this->objectManager = $objectManager;

        $this->setHydrator(new DoctrineHydrator($objectManager))->setObject(new Entity());

        $this->add([
            'type' => Element\Text::class,
            'name' => 'last_name',
        ]);

        $this->add([
            'type' => Element\Text::class,
            'name' => 'first_name',
        ]);
    }

    public function getInputFilterSpecification()
    {
        return [
            'last_name' => [
                'required' => true,
            ],
            'first_name' => [
                'required' => true,
            ],
        ];
    }
}
