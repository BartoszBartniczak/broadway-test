<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Command;


use BartoszBartniczak\Demo\Domain\Model\User\User;
use BartoszBartniczak\Demo\Domain\Service\Repository\UserRepository;
use BartoszBartniczak\Demo\Domain\Command\CommandHandler as CommandHandlerInterface;

class CommandHandler implements CommandHandlerInterface
{

    /**
     * @var UserRepository
     */
    private $repository;

    public function handleCreateNewUser(CreateNewUserCommand $command)
    {

        $user = User::createNew($command->getId());

        $this->repository->save($user);

    }

}