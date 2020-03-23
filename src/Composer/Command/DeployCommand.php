<?php

namespace Ansistrano\Composer\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Composer\Command\BaseCommand;

class DeployCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('deploy');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('ansible-playbook -i .ansistrano/hosts .ansistrano/deploy.yml');
    }
}
