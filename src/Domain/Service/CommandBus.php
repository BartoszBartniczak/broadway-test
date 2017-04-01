<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Service;


use BartoszBartniczak\Demo\Domain\Command\Command;
use BartoszBartniczak\Demo\Domain\Command\CommandHandler;

interface CommandBus
{

    public function dispatch(Command $command);

    public function subscribe(CommandHandler $commandHandler);

}