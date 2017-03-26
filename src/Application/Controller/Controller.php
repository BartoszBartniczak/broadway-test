<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Controller;


abstract class Controller
{

   function jsonResponse(array $data, int $code):Response{
       return new Response($data, $code);
   }

}