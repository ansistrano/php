<?php

namespace Ansistrano\Composer;

use Ansistrano\Composer\Command\DeployCommand;
use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;

class CommandProvider implements CommandProviderCapability
{
    public function getCommands()
    {
        return array(
            new DeployCommand
        );
    }
}
