<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP\Networks\Network;

class cyNetwork
{    
    /**
     * @param \Request $request
     * @param number $networkId
     * @return object
     *
     */
    public static function getNetworkInJsonFormat($request, $networkId)
    {
        if (trim($networkId) == '') return '';
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks/$networkId";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param number $networkId
     * @param string $title 
     * @param array $networkArray     
     * @return string
     *
     */
    public static function createSubNetwork($request, $networkId, $title, $subNetworkArray)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks/$networkId";
        if (!empty($title)) {
            $uri .= "/?title=$title";
        }
        $result = \Httpful\Request::post($uri)
                  ->sendsJson()
                  ->body(json_encode($subNetworkArray))
                  ->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param number $networkId
     * @return boolean
     *
     */
    public static function deleteNetwork($request, $networkId)
    {
        if (trim($networkId) == '') return '';
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks/$networkId";
        $result = \Httpful\Request::delete($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }
}