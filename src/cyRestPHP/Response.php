<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */
 
namespace cyRestPHP;

/**
 * The result of the most recent API request.
 *
 */

class Response
{
    /** @var string|null API path from the most recent request */
    private static $apiPath;
    /** @var int HTTP status code from the most recent request */
    private static $httpCode = 0;
    /** @var array HTTP headers from the most recent request */
    private static $headers = [];
    /** @var array|object Response body from the most recent request */
    private static $body = [];
    /** @var array HTTP headers from the most recent request that start with X */
    private static $xHeaders = [];
    
    /**
     * @param string $apiPath
     */
    public static function setApiPath($apiPath)
    {
        self::$apiPath = $apiPath;
    }
    
    /**
     * @return string|null
     */
    public static function getApiPath()
    {
        return self::$apiPath;
    }
    
    /**
     * @param array|object $body
     */
    public static function setBody($body)
    {
        self::$body = $body;
    }
    
    /**
     * @return array|object|string
     */
    public static function getBody()
    {
        return self::$body;
    }
    
    /**
     * @param int $httpCode
     */
    public static function setHttpCode($httpCode)
    {
        self::$httpCode = $httpCode;
    }
    
    /**
     * @return int
     */
    public static function getHttpCode()
    {
        return self::$httpCode;
    }
    
    /**
     * @param array $headers
     */
    public static function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            if (substr($key, 0, 1) == 'x') {
                self::$xHeaders[$key] = $value;
            }
        }
        self::$headers = $headers;
    }
    
    /**
     * @return array
     */
    public static function getsHeaders()
    {
        return self::$headers;
    }
    
    /**
     * @param array $xHeaders
     */
    public static function setXHeaders(array $xHeaders = [])
    {
        self::$xHeaders = $xHeaders;
    }
    
    /**
     * @return array
     */
    public static function getXHeaders()
    {
        return self::$xHeaders;
    }
}