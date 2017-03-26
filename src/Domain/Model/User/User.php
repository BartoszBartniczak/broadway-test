<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User;


use BartoszBartniczak\Demo\Domain\Model\Entity;
use BartoszBartniczak\Demo\Domain\Model\Identity;
use BartoszBartniczak\Demo\Domain\Model\User\Event\UserWasCreated;

class User extends Entity
{
    /**
     * @var Id
     */
    protected $id;

    final public function __construct()
    {
    }

    public function getIdentity(): Identity
    {
        return $this->getIdentity();
    }

    public static function createNew(Id $id):User
    {
        $user = new User();
        $user->apply( new UserWasCreated($id) );
        return $user;
    }

    public function applyUserWasCreated(UserWasCreated $userWasCreated){

        $this->id = $userWasCreated->getUserId()->getValue();

    }

}