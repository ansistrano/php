# ansistrano/php WIP

PHP Compose package for facilitate the set-up for deploying PHP applications.

## Goal: Deploy in two commands

    composer require ansistrano/php
    composer deploy

Application deployed!

## Deploy Script

    composer deploy
    
It should be executing ```ansible-playbook .ansistrano/deploy.yml -i .ansistrano/hosts```

## Internals

There may be some alternatives as an implementation:

A. We can use a ```composer-plugin``` and combination of events as possible option.
B. We can use a ```composer-plugin``` and a customer installer.
