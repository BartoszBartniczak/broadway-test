<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;

use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;
use Broadway\Serializer\Serializable;

abstract class Event implements Serializable
{
    const USER_EMAIL = 'userEmail';

    /**
     * @var Id
     */
    private $email;

    /**
     * Event constructor.
     * @param Email $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @return Id
     */
    public function getEmail(): Id
    {
        return $this->email;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            self::USER_EMAIL=>$this->getEmail()->getValue(),
        ];
    }




}