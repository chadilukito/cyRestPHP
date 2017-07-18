<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP\Collections;

class cyCollections
{
    /**
     * @param \Request $request
     * @param number $subsuid
     * @return array
     *
     */
    public static function returnSuidOfRootNetworks($request, $subsuid='')
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/collections";
        if (!empty($subsuid)) {
            $uri .= "/?subsuid=$subsuid";
        }
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @return number
     *
     */
    public static function returnRootNetworksCount($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/collections/count";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body->count : -1);
    }
    
    /**
     * @param \Request $request
     * @param number $networkId
     * @return object
     *
     */
    public static function returnNetworkMetadata($request, $networkId)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/collections/{$networkId}.cx";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
}