<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Service;


use BartoszBartniczak\Demo\Domain\Service\UUIDGenerator;
use Ramsey\Uuid\Uuid;

class RamseyUUIDGeneratorAdapter implements UUIDGenerator
{

    /**
     * @return string
     */
    public function generate(): string
    {
       return Uuid::uuid4();
    }

}