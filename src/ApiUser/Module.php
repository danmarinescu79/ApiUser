<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-22 16:19:21
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-03-22 16:20:39
 */

namespace ApiUser;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
