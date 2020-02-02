<?php

require_once __DIR__.'/../../vendor/autoload.php';

$pullRequests = new Bitbucket\API\Repositories\PullRequests;

// Your Bitbucket credentials
$bb_user = 'username';
$bb_pass = 'password';

/**
 * $accountname The team or individual account owning the repository.
 * repo_slub    The repository identifier.
 */
$accountname    = 'company';
$repo_slug      = 'sandbox';

// login
$invitation->setCredentials(new Http\Message\Authentication\BasicAuth($bb_user, $bb_pass));

# get list of pull requests
print_r($pullRequests->all($accountname, $repo_slug));
