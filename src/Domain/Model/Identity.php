<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Domain\Model;


interface Identity
{

    /**
     * @return string
     */
    public function getValue():string;

    public function __toString():string;

}