<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Service\Repository;


use BartoszBartniczak\Demo\Domain\Model\Entity;
use BartoszBartniczak\Demo\Domain\Model\Identity;
use BartoszBartniczak\Demo\Domain\Model\User\User;
use BartoszBartniczak\Demo\Domain\Service\Repository\User\CannotFindUserException;
use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\AggregateFactory;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;
use Broadway\Repository\AggregateNotFoundException;

class UserRepository implements \BartoszBartniczak\Demo\Domain\Service\Repository\User\UserRepository
{

    /**
     * @var EventSourcingRepository
     */
    private $eventSourcingRepository;

    public function __construct(EventStore $eventStore, EventBus $eventBus, $eventStreamDecorators = [])
    {
        $aggregateClass = User::class;
        $aggregateFactory = new PublicConstructorAggregateFactory();

        $this->eventSourcingRepository = new EventSourcingRepository($eventStore, $eventBus, $aggregateClass, $aggregateFactory, $eventStreamDecorators);
    }

    /**
     * @param Entity $entity
     */
    public function save(Entity $entity)
    {
        $this->eventSourcingRepository->save($entity);
    }

    /**
     * @param Identity $identity
     * @return User
     * @throws CannotFindUserException
     */
    public function load(Identity $identity)
    {
        try {
            $user =  $this->eventSourcingRepository->load($identity);
            /* @var $user User */
            return $user;
        } catch (AggregateNotFoundException $aggregateNotFoundException) {
            throw new CannotFindUserException(
                sprintf(
                    "User with email '%s' does not exists.",
                    $identity->getValue()
                ),
                null,
                $aggregateNotFoundException
            );
        }
    }


}