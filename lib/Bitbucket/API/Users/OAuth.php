<?php

/*
 * This file is part of the bitbucket_api package.
 *
 * (c) Alexandru G. <alex@gentle.ro>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bitbucket\API\Users;

use Bitbucket\API\Api;

/**
 * OAuth class
 *
 * Allows you to maintain OAuth consumers.
 *
 * @author  Alexandru G.    <alex@gentle.ro>
 */
class OAuth extends Api
{
    /**
     * Get all OAuth consumers
     *
     * @access public
     * @param  string $account The name of an individual or team account.
     * @return mixed
     */
    public function all($account)
    {
        return $this->requestGet(
            sprintf('users/%s/consumers', $account)
        );
    }

    /**
     * Create new OAuth consumer
     *
     * @access public
     * @param  string $account     The name of an individual or team account.
     * @param  string $name        A display name for the key.
     * @param  string $description A description of the key. (optional)
     * @param  string $url         The location of the service that will use the key. (optional)
     * @return mixed
     */
    public function create($account, $name, $description = null, $url = null)
    {
        $params['name'] = $name;

        if (!is_null($description)) {
            $params['description'] = $description;
        }

        if (!is_null($url)) {
            $params['url'] = $url;
        }

        return $this->requestPost(
            sprintf('users/%s/consumers', $account),
            $params
        );
    }
}
