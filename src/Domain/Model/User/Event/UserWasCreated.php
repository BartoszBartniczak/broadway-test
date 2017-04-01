<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;


use BartoszBartniczak\Demo\Domain\Model\User\Id;

class UserWasCreated extends Event
{
    public static function deserialize(array $data)
    {
        return new self(
           new Id( $data[self::KEY_BASKET_ID] )
        );
    }


}