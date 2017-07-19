<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP\V1\Apply\Styles;

class cyStyles
{
    /**
     * @param \Request $request
     * @return array
     *
     */
    public static function getListOfAllVisualStyleNames($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/styles";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
    
    /**
     * @param \Request $request
     * @param string $algorithmName
     * @param number $networkId
     * @return boolean
     *
     */
    public static function applyVisualStyleToNetwork($request, $styleName, $networkId)
    {
        if (trim($styleName) == '') return false;
        if (trim($networkId) == '') return false;
        $styleName = trim($styleName);
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/styles/$styleName/$networkId";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }

}