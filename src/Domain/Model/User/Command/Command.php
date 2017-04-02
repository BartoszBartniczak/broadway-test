<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Command;


use BartoszBartniczak\Demo\Domain\Command\Command as CommandInterface;
use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

abstract class Command implements CommandInterface
{

    /**
     * @var Email
     */
    private $email;

    /**
     * UserCommand constructor.
     * @param Email $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

}