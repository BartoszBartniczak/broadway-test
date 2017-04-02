<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Controller;


use BartoszBartniczak\Demo\Domain\Model\User\Command\CreateNewUserCommand;
use BartoszBartniczak\Demo\Domain\Model\User\Command\UserAlreadyExistsException;
use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\Model\User\Name;
use BartoszBartniczak\Demo\Domain\Service\UUIDGenerator;
use BartoszBartniczak\Demo\Domain\Service\CommandBus;
use BartoszBartniczak\Demo\Domain\Service\Repository\User\UserRepository as UserRepository;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

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

    public function createNewUserAction(array $data): Response
    {
        $id = new Id($this->uuidGenerator->generate());
        $email = new Email($data['email']);
        $name = new Name($data['name']['firstName'], $data['name']['lastName']);

        try {
            $createNewUserCommand = new CreateNewUserCommand($id, $email, $name);
            $this->commandBus->dispatch($createNewUserCommand);
            $user = $this->userRepository->load($id);
            return $this->jsonResponse(['user' => $user], Response::HTTP_STATUS_CREATED);
        } catch (UserAlreadyExistsException $alreadyExistsException) {
            return $this->jsonResponse([], Response::HTTP_STATUS_CONFLICT);
        }

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