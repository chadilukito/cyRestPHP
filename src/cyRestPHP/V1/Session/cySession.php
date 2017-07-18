<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP\V1\Session;

class cySession
{
    /**
     * @param \Request $request
     * @param string $file
     * @return string
     *
     */
    public static function loadNewSessionFromLocalFile($request, $file='')
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/session";
        if (!empty($file)) {
            $uri .= "/?file=$file";
        }
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param string $file
     * @return string
     *
     */
    public static function createSessionFile($request, $file)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/session";
        if (!empty($file)) {
            $uri .= "/?file=$file";
        }
        $result = \Httpful\Request::post($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @return string
     *
     */
    public static function deleteCurrentSessionAndStartNew($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/session";
        $result = \Httpful\Request::delete($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @return string
     *
     */
    public static function getCurrentSessionName($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/session/name";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
}