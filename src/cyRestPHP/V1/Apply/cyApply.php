<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP\V1\Apply;

class cyApply
{
    /**
     * @param \Request $request
     * @param number $networkId
     * @return boolean
     *
     */
    public static function applyEdgeBundlingToNetwork($request, $networkId)
    {
        if (trim($networkId) == '') return false;
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/edgebundling/$networkId";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }

    /**
     * @param \Request $request
     * @param number $networkId
     * @return boolean
     *
     */
    public static function fitNetworkToWindow($request, $networkId)
    {
        if (trim($networkId) == '') return false;
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/fit/$networkId";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }
}