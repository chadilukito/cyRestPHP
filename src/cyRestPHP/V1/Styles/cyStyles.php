<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP\V1\Styles;

class cyStyles
{
    /**
     * @param \Request $request
     * @return array
     *
     */
    public static function getListOfVisualStyleTitles($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/styles";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param array $styleArray     
     * @return array
     *
     */
    public static function createNewVisualStyleFromJson($request, $styleArray)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/styles";
        if (empty($styleArray) && !is_array($styleArray)) return '';
        $result = \Httpful\Request::post($uri)
                  ->sendsJson()
                  ->body(json_encode($styleArray))
                  ->send();

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
    public static function deleteAllVisualStyles($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/styles";
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
    public static function getNumberOfVisualStyles($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/styles/count";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body->count : -1);
    }
    
    /**
     * @param \Request $request
     * @param string $name
     * @return array
     *
     */
    public static function getVisualStyleInCytoscapeJsCssFormat($request, $name)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/styles/{$name}.json";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
}