<?php

namespace CrowdinApiClient\Http\ResponseDecorator;

/**
 * Interface ResponseDecoratorInterface
 * @package Crowdin\Http\ResponseDecorator
 */
interface ResponseDecoratorInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function decorate($data);
}
