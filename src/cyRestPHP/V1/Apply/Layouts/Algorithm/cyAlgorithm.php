<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP\V1\Apply\Layouts\Algorithm;

class cyAlgorithm
{
    /**
     * @param \Request $request
     * @param string $algorithmName
     * @return object
     *
     */
    public static function getLayoutParametersForAlgorithm($request, $algorithmName)
    {
        if (trim($algorithmName) == '') return '';
        $algorithmName = trim($algorithmName);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts/$algorithmName";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }

    /**
     * @param \Request $request
     * @param string $algorithmName
     * @return object
     *
     */
    public static function columnDataTypesCompatibleWithAlgorithm($request, $algorithmName)
    {
        if (trim($algorithmName) == '') return '';
        $algorithmName = trim($algorithmName);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts/$algorithmName/columntypes";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }

    /**
     * @param \Request $request
     * @param string $algorithmName
     * @return object
     *
     */
    public static function returnsLayoutParameterList($request, $algorithmName)
    {
        if (trim($algorithmName) == '') return '';
        $algorithmName = trim($algorithmName);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts/$algorithmName/parameters";
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? $result->body : '');
    }

    /**
     * @param \Request $request
     * @param string $algorithmName
     * @param array $newLayoutParams
     * @return boolean
     *
     */
    public static function updateLayoutParametersForAlgorithm($request, $algorithmName, $newLayoutParams)
    {
        if (trim($algorithmName) == '') return false;
        if (empty($newLayoutParams) && !is_array($newLayoutParams)) return false;
        $algorithmName = trim($algorithmName);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts/$algorithmName/parameters";
        $result = \Httpful\Request::put($uri)
                  ->sendsJson()
                  ->body(json_encode($newLayoutParams))
                  ->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }

    /**
     * @param \Request $request
     * @param string $algorithmName
     * @param number $networkId
     * @param string $column
     * @return boolean
     *
     */
    public static function applyLayoutToNetwork($request, $algorithmName, $networkId, $column='')
    {
        if (trim($algorithmName) == '') return false;
        if (trim($networkId) == '') return false;
        $algorithmName = trim($algorithmName);
        $networkId = trim($networkId);

        $uri = $request->getHttpUrl()."/".$request->getRestApiVersion()."/apply/layouts/$algorithmName/$networkId";
        if (!empty($column)) {
            $uri .= "/?column=$column";
        }
        $result = \Httpful\Request::get($uri)->send();

        \cyRestPHP\Response::setApiPath($result->request->uri);
        \cyRestPHP\Response::setHttpCode($result->code);
        \cyRestPHP\Response::setBody($result->body);

        return (($result->code == 200)? true : false);
    }
}