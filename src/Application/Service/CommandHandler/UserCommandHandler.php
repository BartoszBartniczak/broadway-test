<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Service\CommandHandler;


use BartoszBartniczak\Demo\Domain\Model\User\Command\CommandHandler;
use BartoszBartniczak\Demo\Domain\Model\User\Command\CreateNewUserCommand;
use Broadway\CommandHandling\SimpleCommandHandler;

class UserCommandHandler extends SimpleCommandHandler
{

    /**
     * @var CommandHandler
     */
    private $commandHandler;

    /**
     * UserCommandHandler constructor.
     * @param CommandHandler $commandHandler
     */
    public function __construct(CommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    public function handleCreateNewUserCommand(CreateNewUserCommand $createNewUserCommand)
    {
        return $this->commandHandler->handleCreateNewUser($createNewUserCommand);
    }

}