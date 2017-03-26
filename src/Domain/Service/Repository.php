<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Service;



use BartoszBartniczak\Demo\Domain\Model\Entity;
use BartoszBartniczak\Demo\Domain\Model\Identity;

interface Repository
{

    public function save(Entity $entity);

    public function load(Identity $identity);

}