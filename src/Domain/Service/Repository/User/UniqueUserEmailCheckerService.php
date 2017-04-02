<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Service\Repository\User;


use BartoszBartniczak\Demo\Domain\Service\Repository\CannotFindUserException;
use BartoszBartniczak\Demo\Domain\Service\Repository\User\UserRepository;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class UniqueUserEmailCheckerService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UniqueUserEmailCheckerService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function isEmailRegistered(Email $email):bool{

        try {
            $this->userRepository->load($email);
        }
        catch (\BartoszBartniczak\Demo\Domain\Service\Repository\User\CannotFindUserException $cannotFindUserException){
            return false;
        }

        return true;

    }

}