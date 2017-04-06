<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Service\Repository\User;


use BartoszBartniczak\Demo\Domain\Model\User\ReadModel\ListOfRegisteredEmails;
use Broadway\ReadModel\Repository;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class UniqueUserEmailCheckerService
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * UniqueUserEmailCheckerService constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function isEmailRegistered(Email $email):bool{

        return $this->repository->find($email) instanceof ListOfRegisteredEmails;

    }

}