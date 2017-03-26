<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\ValueObject;


use BartoszBartniczak\Demo\Domain\Model\Identity;

class UUID implements Identity
{
    /**
     * @var string
     */
    private $value;

    /**
     * UUID constructor.
     * @param $value
     */
    public function __construct(string $value)
    {
        //TODO validate input

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

}