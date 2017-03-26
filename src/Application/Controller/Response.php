<?php
/**
 * Created by PhpStorm.
 * User: Bartosz Bartniczak <kontakt@bartoszbartniczak.pl>
 */

namespace BartoszBartniczak\Demo\Application\Controller;


class Response
{

    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_CREATED = 201;

    const HTTP_STATUS_NOT_FOUND = 404;

    /**
     * @var mixed
     */
    private $data;

    /**
     * @var int
     */
    private $code;

    /**
     * Response constructor.
     * @param mixed $data
     * @param int $code
     */
    public function __construct($data, int $code)
    {
        $this->data = $data;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

}