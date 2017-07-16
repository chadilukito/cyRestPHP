<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP;

class cyGeneral
{
    /**
     * @param \Request $request
     * @return \Response
     *
     */
    public static function getAvailableRestApiVersions($request)
    {
        $uri = $request->getHttpUrl();
        $result = \Httpful\Request::get($uri)->send();
 
        $response = new \cyRestPHP\Response();
        $response->setApiPath($result->request->uri);
        $response->setHttpCode($result->code);
        $response->setBody($result->body->availableApiVersions);        
        
        return $response;
    }
}