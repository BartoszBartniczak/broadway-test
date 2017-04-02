<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;


use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\Model\User\Name;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class UserWasCreated extends Event
{

    /**
     * @var Name
     */
    private $name;

    /**
     * @var Email
     */
    private $email;

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    public function __construct(Id $id, Email $email, Name $name)
    {
        parent::__construct($id);
        $this->email = $email;
        $this->name = $name;
    }

    public function serialize()
    {
        return array_merge(
            parent::serialize(),
            [
                'email'=>$this->getEmail()->getValue(),
                'name'=> [
                    'firstName'=>$this->name->getFirstName(),
                    'lastName'=>$this->name->getLastName()
                ]
            ]
            );
    }


    public static function deserialize(array $data)
    {
        return new self(
            new Id($data[self::ID]),
            new Email($data['email']),
            new Name( $data['name']['firstName'], $data['name']['lastName'] )
        );
    }


}