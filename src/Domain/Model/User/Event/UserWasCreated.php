<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;


class UserWasCreated extends Event
{
    public static function deserialize(array $data)
    {
        return new self($data[self::KEY_BASKET_ID]);
    }


}