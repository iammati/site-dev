<?php

declare(strict_types=1);

/*
 * This file is part of the package site/site-dev.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Site\SiteDev\Error;

use Spatie\Ignition\Config\IgnitionConfig;
use Spatie\Ignition\Ignition;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Error\ErrorHandler;

class DebugExceptionHandler
{
    public function __construct()
    {
        $config = require_once Environment::getComposerRootPath() . '/config/system/.ignition.php';

        Ignition::make()
            ->applicationPath(Environment::getComposerRootPath())
            ->setConfig(new IgnitionConfig($config))
            ->register();

        set_error_handler([new ErrorHandler(E_ALL), 'handleError']);
    }
}
