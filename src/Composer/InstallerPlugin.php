<?php

namespace Ansistrano\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;

class InstallerPlugin implements PluginInterface, EventSubscriberInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new Installer($io, $composer);
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
        print_r($packageEvent);
    }

//    public function onPreFileDownload(PreFileDownloadEvent $event)
//    {
//        $protocol = parse_url($event->getProcessedUrl(), PHP_URL_SCHEME);
//
//        if ($protocol === 's3') {
//            $awsClient = new AwsClient($this->io, $this->composer->getConfig());
//            $s3RemoteFilesystem = new S3RemoteFilesystem($this->io, $event->getRemoteFilesystem()->getOptions(), $awsClient);
//            $event->setRemoteFilesystem($s3RemoteFilesystem);
//        }
//    }
}
