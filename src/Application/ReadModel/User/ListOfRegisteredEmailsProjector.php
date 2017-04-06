<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\ReadModel\User;


use BartoszBartniczak\Demo\Domain\Model\User\Event\UserWasCreated;
use Broadway\ReadModel\Projector;
use Broadway\ReadModel\Repository;

class ListOfRegisteredEmailsProjector extends Projector
{

    /**
     * @var Repository
     */
    private $repository;

    /**
     * ListOfRegisteredEmailsProjector constructor.
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UserWasCreated $userWasCreated
     */
    protected function applyUserWasCreated(UserWasCreated $userWasCreated){

        if(!$this->repository->findBy(['email'=>$userWasCreated->getEmail()->getValue()])){
            $listOfRegisteredEmails = new ListOfRegisteredEmails($userWasCreated->getEmail());
            $this->repository->save($listOfRegisteredEmails);
        }

    }


}