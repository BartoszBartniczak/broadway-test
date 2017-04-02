<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Event;

use BartoszBartniczak\Demo\Domain\Model\User\Id;
use BartoszBartniczak\Demo\Domain\ValueObject\Email;
use Broadway\Serializer\Serializable;

abstract class Event implements Serializable
{
    const ID = 'id';

    /**
     * @var Id
     */
    private $id;

    /**
     * Event constructor.
     * @param Id $id
     */
    public function __construct(Id $id)
    {
        $this->id = $id;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            self::ID=>$this->getId()->getValue(),
        ];
    }




}