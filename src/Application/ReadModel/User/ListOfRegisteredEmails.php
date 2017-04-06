<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\ReadModel\User;

use BartoszBartniczak\Demo\Domain\Model\User\ReadModel\ListOfRegisteredEmails as ListOfRegisteredEmailsInterface;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;
use Broadway\ReadModel\SerializableReadModel;

class ListOfRegisteredEmails implements ListOfRegisteredEmailsInterface, SerializableReadModel
{

    /**
     * @var Email
     */
    private $email;

    /**
     * ListOfRegisteredEmails constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->registerEmail(new Email($email));
    }


    public function getId()
    {
        return $this->email->getValue();
    }

    public function registerEmail(Email $email)
    {
        return $this->email = $email;
    }

    public static function deserialize(array $data)
    {
        return new self(new Email($data['email']));
    }

    public function serialize()
    {
        return [
            'email' => $this->email->getValue()
        ];
    }


}