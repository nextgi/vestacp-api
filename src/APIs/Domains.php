<?php

namespace nextgi\VestaCP\APIs;

use Exception;
use nextgi\VestaCP\Helper;
use SimpleXMLElement;

/**
 * Class Domains
 *
 * @package nextgi\VestaCP\APIs
 * @todo    Check all the APIs parameters there are some changes.
 */
class Domains
{
    use Helper;

    /**
     * @var string
     */
    protected $api = 'domains';

    /**
     * @param string[] $user
     *
     * @return array|Exception
     * @throws Exception
     * @link https://github.com/serghey-rodin/vesta/blob/master/bin/v-list-web-domains
     */
    public function getDomainList(
        $user
    ) {
        return $this->post(
            'available',
            [
                'cmd'  => 'v-list-web-domains',
                'arg1' => $user,
                'arg2' => 'json',
            ]
        );
    }
}
