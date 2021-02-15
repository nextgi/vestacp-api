<?php

namespace nextgi\VestaCP\APIs;

use Exception;
use nextgi\VestaCP\Helper;
use SimpleXMLElement;

/**
 * Class Dns
 *
 * @package nextgi\VestaCP\APIs
 * @todo    Check all the APIs parameters there are some changes.
 */
class Dns
{
    use Helper;

    /**
     * @var string
     */
    protected $api = 'dns';

    /**
     * @param string[] $user
     *
     * @return array|Exception
     * @throws Exception
     * @link https://github.com/serghey-rodin/vesta/blob/master/bin/v-list-dns-domains
     */
    public function getZoneList(
        $user
    ) {
        return $this->post(
            'available',
            [
                'cmd'  => 'v-list-dns-domains',
                'arg1' => $user,
                'arg2' => 'json',
            ]
        );
    }

    /**
     * @param string[] $user
     * @param string[] $domain
     *
     * @return array|Exception
     * @throws Exception
     * @link https://github.com/serghey-rodin/vesta/blob/master/bin/v-list-dns-records
     */
    public function getZoneRecords(
        $user,
        $domain
    ) {
        return $this->post(
            'available',
            [
                'cmd'  => 'v-list-dns-records',
                'arg1' => $user,
                'arg2' => $domain,
                'arg3' => 'json',
            ]
        );
    }
}
