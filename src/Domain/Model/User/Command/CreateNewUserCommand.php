<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Command;


use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\Model\User\Name;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;

class CreateNewUserCommand extends Command
{

    /**
     * @var Email
     */
    private $email;

    /**
     * @var Name
     */
    private $name;

    public function __construct(Id $id, Email $email, Name $name)
    {
        parent::__construct($id);
        $this->email = $email;
        $this->name = $name;
    }

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

}