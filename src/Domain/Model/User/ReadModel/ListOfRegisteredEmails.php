<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\ReadModel;


use BartoszBartniczak\Demo\Domain\ValueObject\Email;

interface ListOfRegisteredEmails
{

    /**
     * @param Email $email
     * @return mixed
     */
    public function registerEmail(Email $email);

}