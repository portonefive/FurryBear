<?php

/**
 * FurryBear
 * 
 * PHP Version 5
 * 
 * @package     FurryBear
 * @author      lobostome <lobostome@local.dev>
 * @license     http://opensource.org/licenses/MIT
 * @link        https://github.com/lobostome/FurryBear
 * @category    Congress API
 */
namespace FurryBear\Proxy;
/**
 * A proxy that provides a surrogate for curl.
 * 
 * @package     FurryBear
 * @author      lobostome <lobostome@local.dev>
 * @license     http://opensource.org/licenses/MIT
 * @link        http://curl.haxx.se/
 * @category    Congress API
 */
class CurlProxy implements HttpRequest 
{    
    /**
     * A connection handle.
     * 
     * @var resource
     */
    private $_handle = null;
    
    /**
     * Initialize a connection session.
     * 
     * @param string $url The target URI location.
     */
    public function __construct($url)
    {
        $this->_handle = curl_init($url);
    }
    
    /**
     * {@inheritdoc}
     * 
     * @return void
     */
    public function close()
    {
        curl_close($this->_handle);
    }

    /**
     * {@inheritdoc}
     * 
     * @return mixed
     */
    public function execute()
    {
        return curl_exec($this->_handle);
    }

    /**
     * {@inheritdoc}
     * 
     * @param int $name The return key constant.
     * 
     * @return mixed
     */
    public function getInfo($name)
    {
        return curl_getinfo($this->_handle, $name);
    }

    /**
     * {@inheritdoc}
     * 
     * @param int   $name   The CURLOPT_XXX option to set.
     * @param mixed $value  The value to be set on option.
     * 
     * @return void
     */
    public function setOption($name, $value)
    {
        curl_setopt($this->_handle, $name, $value);
    }
}