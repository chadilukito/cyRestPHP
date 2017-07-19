<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP\V1\Networks;

class cyNetworks
{
    const NEW_NETWORK_FORMAT_JSON = 'json';
    const NEW_NETWORK_FORMAT_EDGELIST = 'edgelist';
    
    /**
     * @param \Request $request
     * @param string $column
     * @param string $query
     * @return array
     *
     */
    public static function returnSuidOfRootNetworks($request, $column='', $query='')
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks";
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
     * @param string $collection
     * @param string $format
     * @param string $title 
     * @param string $source
     * @param array $networkArray     
     * @return string
     *
     */
    public static function createNewNetwork($request, $collection, $format, $title, $source='', $networkArray)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks";
        if (empty($networkArray) && !is_array($networkArray)) return '';
        if (!empty($collection) && (!empty($format) && ($format==self::NEW_NETWORK_FORMAT_JSON || $format==self::NEW_NETWORK_FORMAT_EDGELIST)) && !empty($title)) {
            $collection = str_replace(' ', '_', $collection);
            $title = str_replace(' ', '_', $title);
            
            $uri .= "/?collection=$collection&format=$format&title=$title";    
            if (!empty($source)) {
                $uri .= "&source=$source";
            }
        }
        $result = \Httpful\Request::post($uri)
                  ->sendsJson()
                  ->body(json_encode($networkArray))
                  ->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body->networkSUID : '');
    }    
    
    /**
     * @param \Request $request
     * @return boolean
     *
     */
    public static function deleteAllNetworksInCurrentSession($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks";
        $result = \Httpful\Request::delete($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }    
    
    /**
     * @param \Request $request
     * @return number
     *
     */
    public static function getNumberOfNetworksInCurrentSession($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/networks/count";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body->count : -1);
    }
}