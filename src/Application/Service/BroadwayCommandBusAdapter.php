<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Service;


use BartoszBartniczak\Demo\Domain\Command\Command;
use BartoszBartniczak\Demo\Domain\Command\CommandHandler;
use BartoszBartniczak\Demo\Domain\Service\CommandBus;
use Broadway\CommandHandling\CommandBus as BroadwayCommandBus;

class BroadwayCommandBusAdapter implements CommandBus
{

    /**
     * @var BroadwayCommandBus
     */
    private $broadwayCommandBus;

    /**
     * BroadwayCommandBusAdapter constructor.
     * @param BroadwayCommandBus $broadwayCommandBus
     */
    public function __construct(BroadwayCommandBus $broadwayCommandBus)
    {
        $this->broadwayCommandBus = $broadwayCommandBus;
    }

    public function dispatch(Command $command)
    {
        return $this->broadwayCommandBus->dispatch($command);
    }

    public function subscribe(CommandHandler $commandHandler)
    {
        return $this->broadwayCommandBus->subscribe($commandHandler);
    }


}