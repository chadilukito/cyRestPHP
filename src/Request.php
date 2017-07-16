<?php
/**
 * Apache License 2.0
 * Copyright (c) 2017 Christian Hadi
 */

namespace cyRestPHP;

class Request
{
    protected $defaultCyRestAPIVersion = 'v1';
    protected $httpUrl;
    protected $cyRestAPIVersion;

    public static $version = '1.0';

    /**
     * Constructor
     *
     * @param string $httpUrl
     */
    public function __construct($httpUrl)
    {
        $this->httpUrl = $httpUrl;
        $this->cyRestAPIVersion = $this->defaultCyRestAPIVersion;
    }

    public function getHttpUrl()
    {
        return $this->httpUrl;
    }

    public function getRestApiVersion()
    {
        return $this->cyRestAPIVersion;
    }

    public function setRestApiVersion($version)
    {
        $this->cyRestAPIVersion = $version;
    }

}