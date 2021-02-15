<?php

namespace nextgi\VestaCP;

use GuzzleHttp\Client as Guzzle;
use nextgi\VestaCP\APIs\Domains;
use nextgi\VestaCP\APIs\Dns;

/**
 * Class VestaApi
 *
 * @package nextgi\VestaCP
 */
class VestaApi
{
    /**
     * @var Guzzle
     */
    private $guzzle;

    /**
     * List of API classes
     *
     * @var array
     */
    private $apiList = [];

    /**
     * Authentication info needed for every request
     *
     * @var array
     */
    private $authentication = [];

    /**
     * VestaApi constructor.
     *
     * @param int    $host
     * @param int    $userId
     * @param string $apiKey
     * @param bool   $testMode
     * @param int    $timeout
     * @param string $bindIp
     *
     * @return void
     */
    public function __construct(
		$host
        $user,
        $password,
        $timeout = 0,
        $bindIp = '0'
    ) {
        $this->authentication = [
            'user' => $user,
            'password'     => $password,
        ];

        $guzzleConfig = [
            'base_uri'        => $host,
            'defaults'        => ['query' => $this->authentication],
            'verify'          => false,
            'connect_timeout' => (float)$timeout,
            'timeout'         => (float)$timeout,
        ];

        if (!empty($bindIp)) {
            $guzzleConfig['curl'] = [CURLOPT_INTERFACE => $bindIp];
            $guzzleConfig['stream_context'] = ['socket' => ['bindto' => $bindIp]];
        }

        $this->guzzle = new Guzzle($guzzleConfig);
    }

    /**
     * @param $api
     *
     * @return mixed
     */
    private function _getAPI($api)
    {
        if (empty($this->apiList[$api])) {
            $class = 'nextgi\\VestaCP\\APIs\\'.$api;
            $this->apiList[$api] = new $class(
                $this->guzzle,
                $this->authentication
            );
        }

        return $this->apiList[$api];
    }

    /**
     * @return Domains
     */
    public function domains()
    {
        return $this->_getAPI('Domains');
    }

    /**
     * @return Dns
     */
    public function dns()
    {
        return $this->_getAPI('Dns');
    }
}
