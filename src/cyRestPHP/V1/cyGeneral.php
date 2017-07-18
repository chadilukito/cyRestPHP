<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP\V1;

class cyGeneral
{
    /**
     * @param \Request $request
     * @return array
     *
     */
    public static function getAvailableRestApiVersions($request)
    {
        $uri = $request->getHttpUrl();
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body->availableApiVersions);

        return (($result->code == 200)? $result->body->availableApiVersions : '');
    }
    
    /**
     * @param \Request $request
     * @return object
     *
     */
    public static function getServerStatus($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion();
        $result = \Httpful\Request::get($uri)->send();
        
        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @return boolean
     *
     */
    public static function runSystemGC($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/gc";
        $result = \Httpful\Request::get($uri)->send();
        
        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }
    
    /**
     * @param \Request $request
     * @return object
     *
     */
    public static function getCytoscapeAndRestApiVersion($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/version";
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
    public static function getNumberOfGlobalTables($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/tables/count";
        $result = \Httpful\Request::get($uri)->send();
        
        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body->count : -1);
    }
    
    /**
     * @param \Request $request
     * @param string $column
     * @param string $query
     * @return array of object
     *
     */
    public static function getNetworksInJsonFormat($request, $column='', $query='')
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks.json";
        if (!empty($column) && !empty($query)) {
            $uri .= "/?column=$column&query=$query";    
        }
        $result = \Httpful\Request::get($uri)->send();
        
        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param string $column
     * @param string $query
     * @return array of object
     *
     */
    public static function getSimpleNetworksInJsonFormat($request, $column='', $query='')
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks.names";
        if (!empty($column) && !empty($query)) {
            $uri .= "/?column=$column&query=$query";    
        }
        $result = \Httpful\Request::get($uri)->send();
        
        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
}