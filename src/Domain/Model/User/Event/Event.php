<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;

use BartoszBartniczak\Demo\Domain\Model\User\Id;
use Broadway\Serializer\Serializable;

abstract class Event implements Serializable
{
    const KEY_BASKET_ID = 'basketId';

    /**
     * @var Id
     */
    private $userId;

    /**
     * Event constructor.
     * @param Id $basketId
     */
    public function __construct(Id $basketId)
    {
        $this->userId = $basketId;
    }

    /**
     * @return Id
     */
    public function getUserId(): Id
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            self::KEY_BASKET_ID=>$this->getUserId()->getValue(),
        ];
    }


}