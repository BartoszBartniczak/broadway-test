<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Command;


use BartoszBartniczak\Demo\Domain\Model\User\User;
use BartoszBartniczak\Demo\Domain\Service\Repository\User\UniqueUserEmailCheckerService;
use BartoszBartniczak\Demo\Domain\Service\Repository\User\UserRepository;
use BartoszBartniczak\Demo\Domain\Command\CommandHandler as CommandHandlerInterface;

class CommandHandler implements CommandHandlerInterface
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UniqueUserEmailCheckerService
     */
    private $uniqueUserEmailCheckerService;

    /**
     * CommandHandler constructor.
     * @param \BartoszBartniczak\Demo\Domain\Service\Repository\User\UserRepository $repository
     * @param UniqueUserEmailCheckerService $uniqueUserEmailCheckerService
     */
    public function __construct(UserRepository $repository, UniqueUserEmailCheckerService $uniqueUserEmailCheckerService)
    {
        $this->uniqueUserEmailCheckerService = $uniqueUserEmailCheckerService;
        $this->repository = $repository;
    }


    public function handleCreateNewUser(CreateNewUserCommand $command)
    {
        if($this->uniqueUserEmailCheckerService->isEmailRegistered($command->getEmail())){
            throw new UserAlreadyExistsException(sprintf(
                "User with email '%s' already exists in repository.",
                $command->getId()->getValue()
            ));
        }

        $user = User::createNew($command->getId(), $command->getEmail(), $command->getName());

        $this->repository->save($user);

    }

}