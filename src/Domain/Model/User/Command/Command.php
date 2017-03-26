<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model\User\Command;


use BartoszBartniczak\Demo\Domain\Command\Command as CommandInterface;
use BartoszBartniczak\Demo\Domain\Model\User\Id;

abstract class Command implements CommandInterface
{

    /**
     * @var Id
     */
    private $id;

    /**
     * UserCommand constructor.
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

}