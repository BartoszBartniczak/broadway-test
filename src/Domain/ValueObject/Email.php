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

    /**
     * Email constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }


}