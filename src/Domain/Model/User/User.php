<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User;


use BartoszBartniczak\Demo\Domain\Model\Entity;
use BartoszBartniczak\Demo\Domain\Model\Identity;
use BartoszBartniczak\Demo\Domain\Model\User\Event\UserWasCreated;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class User extends Entity
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Name
     */
    protected $name;

    final public function __construct()
    {
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Identity
     */
    public function getIdentity(): Identity
    {
        return $this->getId();
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @param Email $email
     * @param Name $name
     * @return User
     */
    public static function createNew(Id $id, Email $email, Name $name):User
    {
        $user = new User();
        $user->apply( new UserWasCreated($id, $email, $name) );
        return $user;
    }

    public function applyUserWasCreated(UserWasCreated $userWasCreated){

        $this->id = $userWasCreated->getId();
        $this->email = $userWasCreated->getEmail();
        $this->name = $userWasCreated->getName();

    }

}