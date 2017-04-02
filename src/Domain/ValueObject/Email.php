<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\ValueObject;


use BartoszBartniczak\Demo\Domain\Model\Identity;

class Email implements Identity
{
    /**
     * @var
     */
    private $value;

    public function getValue(): string
    {
        return $this->value;
    }

}