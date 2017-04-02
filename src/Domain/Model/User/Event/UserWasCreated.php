<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;


use BartoszBartniczak\Demo\Domain\Model\User\Name;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class UserWasCreated extends Event
{
    /**
     * @var Name
     */
    private $name;

    public function __construct(Email $email, Name $name)
    {
        parent::__construct($email);
        $this->name = $name;
    }

    public function serialize()
    {
        return array_merge(
            parent::serialize(),
            [
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
           new Email( $data[self::USER_EMAIL] ),
            new Name( $data['name']['firstName'], $data['name']['lastName'] )
        );
    }


}