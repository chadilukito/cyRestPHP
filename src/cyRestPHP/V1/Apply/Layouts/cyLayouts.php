<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP\V1\Apply\Layouts;

class cyLayouts
{
    /**
     * @param \Request $request
     * @return array
     *
     */
    public static function getListOfAvailableLayoutAlgorithmNames($request)
    {
        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }
}