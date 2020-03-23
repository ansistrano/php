<?php

namespace Ansistrano\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;

class InstallerPlugin implements PluginInterface, EventSubscriberInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new CustomInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    /**
     * @inheritDoc
     */
    public function getCapabilities()
    {
        return array(
            'Composer\Plugin\Capability\CommandProvider' => 'Ansistrano\Composer\CommandProvider'
        );
    }

    public static function getSubscribedEvents()
    {
        return array(
            PackageEvents::POST_PACKAGE_INSTALL => array(
                array('onPostPackageInstall', 0)
            )
        );
    }

    public function onPostPackageInstall(PackageEvent $packageEvent)
    {
        echo $packageEvent->getOperation().PHP_EOL;
        echo 'Package Installed: '.$packageEvent->getName().PHP_EOL;
//        $repositories = $packageEvent->getInstalledRepo()->getRepositories();
//        print_r($packageEvent->getInstalledRepo()->getRepositories());

        // if ansistrano
//        echo 'Package Installed: '.$packageEvent->getName().PHP_EOL;
        // print_r($packageEvent->getInstalledRepo()->getRepositories());

        return $packageEvent;
    }
}
