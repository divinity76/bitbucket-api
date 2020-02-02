<?php

require_once __DIR__.'/../vendor/autoload.php';

$invitation = new Bitbucket\API\Invitations;

// Your Bitbucket credentials
$bb_user = 'username';
$bb_pass = 'password';

// login
$invitation->setCredentials(new Http\Message\Authentication\BasicAuth($bb_user, $bb_pass));

// send invitation
print_r($invitation->send('account', 'repository', 'user@example.com', 'read'));
