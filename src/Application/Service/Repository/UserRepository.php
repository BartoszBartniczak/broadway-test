<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Service\Repository;


use BartoszBartniczak\Demo\Domain\Model\Entity;
use BartoszBartniczak\Demo\Domain\Model\Identity;
use BartoszBartniczak\Demo\Domain\Model\User\User;
use Broadway\EventHandling\EventBus;
use Broadway\EventSourcing\AggregateFactory\AggregateFactory;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStore;

class UserRepository implements \BartoszBartniczak\Demo\Domain\Service\Repository\UserRepository
{

    /**
     * @var EventSourcingRepository
     */
    private $eventSourcingRepository;

    public function __construct(EventStore $eventStore, EventBus $eventBus, $eventStreamDecorators = [])
    {
        $aggregateClass = User::class;
        $aggregateFactory = new PublicConstructorAggregateFactory();

       $this->eventSourcingRepository =  new EventSourcingRepository($eventStore, $eventBus, $aggregateClass, $aggregateFactory, $eventStreamDecorators);
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
     * @return \Broadway\Domain\AggregateRoot|\Broadway\EventSourcing\EventSourcedAggregateRoot
     */
    public function load(Identity $identity)
    {
        return $this->eventSourcingRepository->load($identity);
    }


}