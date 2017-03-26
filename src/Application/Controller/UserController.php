<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Controller;


use BartoszBartniczak\Demo\Domain\Model\User\Command\CreateNewUserCommand;
use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\Service\UUIDGenerator;
use BartoszBartniczak\Demo\Domain\Service\CommandBus;
use BartoszBartniczak\Demo\Domain\Service\Repository\UserRepository as UserRepository;

class UserController extends Controller
{

    /**
     * @var UUIDGenerator
     */
    private $uuidGenerator;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UUIDGenerator $uuidGenerator
     * @param CommandBus $commandBus
     * @param UserRepository $userRepository
     */
    public function __construct(UUIDGenerator $uuidGenerator, CommandBus $commandBus, UserRepository $userRepository)
    {
        $this->uuidGenerator = $uuidGenerator;
        $this->commandBus = $commandBus;
        $this->userRepository = $userRepository;
    }

    public function createNewUserAction(array $data):Response
    {

        $userId = new Id($this->uuidGenerator->generate());
        $createNewUserCommand = new CreateNewUserCommand($userId);

        $this->commandBus->dispatch($createNewUserCommand);

        $user = $this->userRepository->load($userId);

        return $this->jsonResponse(['user' => $user], Response::HTTP_STATUS_CREATED);

    }

//    public function findUserAction(string $userId)
//    {
//
//        try {
//            $user = $this->userRepository->load(new Id($userId));
//            return $this->jsonResponse(['user' => $user], self::HTTP_STATUS_OK);
//        } catch (CannotFindUserException $cannotFindUserException) {
//            return $this->jsonResponse(['error_message' => $cannotFindUserException->getMessage()], self::HTTP_STATUS_NOT_FOUND);
//        }
//
//
//    }

}