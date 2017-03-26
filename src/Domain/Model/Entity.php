<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model;


use Broadway\EventSourcing\EventSourcedAggregateRoot;

abstract class Entity extends EventSourcedAggregateRoot
{

    abstract public function getIdentity():Identity;

    public function getAggregateRootId()
    {
        return $this->getIdentity()->getValue();
    }

}