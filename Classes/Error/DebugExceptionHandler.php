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

use Composer\InstalledVersions;
use Spatie\Ignition\Config\IgnitionConfig;
use Spatie\Ignition\Ignition;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Error\ErrorHandler;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\PathUtility;

class DebugExceptionHandler
{
    public function __construct()
    {
        if ((new Typo3Version())->getMajorVersion() >= 11) {
            $composerRootPath = Environment::getComposerRootPath();
        } else {
            $composerRootPath = PathUtility::getCanonicalPath(InstalledVersions::getRootPackage()['install_path']);
        }

        $config = require_once "{$composerRootPath}/config/system/.ignition.php";

        Ignition::make()
            ->applicationPath($composerRootPath)
            ->setConfig(new IgnitionConfig($config))
            ->register();

        set_error_handler([new ErrorHandler(E_ALL), 'handleError']);
    }
}
