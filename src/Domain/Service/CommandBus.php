<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Service;


use BartoszBartniczak\Demo\Domain\Command\Command;

interface CommandBus
{

    public function dispatch(Command $command);

}