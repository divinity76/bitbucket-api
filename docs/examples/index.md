# Usage examples

**TIP:** Although all examples from this documentation are instantiating each class, a single point of entry is also available:

  ```php
  $bitbucket = new \Bitbucket\API\Api();
  $bitbucket->setCredentials(new Http\Message\Authentication\BasicAuth('username', 'password'));

  /** @var \Bitbucket\API\User $user */
  $user = $bitbucket->api('User');

  /** @var \Bitbucket\API\Repositories\Issues $issues */
  $issues = $bitbucket->api('Repositories\Issues');
  ```

### Available examples

  - [Authentication](authentication.html)
  - [Group privileges](group-privileges.html)
  - [Groups](groups.html)
  - [Invitations](invitations.html)
  - [Privileges](privileges.html)
  - [Repositories](repositories.html)
    - [Branch restrictions](repositories/branch-restrictions.html)
    - [Commits](repositories/commits.html)
      - [Comments](repositories/commits/comments.html)
      - [Build statuses](repositories/commits/build-statuses.html)
    - [Deploy keys](repositories/deploy-keys.html)
    - [Issues](repositories/issues.html)
      - [Comments](repositories/issues/comments.html)
    - [Milestones](repositories/milestones.html)
    - [Pull requests](repositories/pull-requests.html)
      - [Comments](repositories/pull-requests/comments.html)
    - [Repository](repositories/repository.html)
    - [Refs](#)
      - [Branches](repositories/refs/branches.html)
      - [Tags](repositories/refs/tags.html)
    - [Hooks](repositories/webhooks.html)
    - [Src](repositories/src.html)
    - [Build statuses](repositories/commits/build-statuses.html)
  - [Teams](teams.html)
      - [Hooks](teams/webhooks.html)
      - [Permissions](teams/permissions.html)
  - [User](user.html)
    - [Permissions](user/permissions.html)
  - [Users](users.html)
    - [Invitations](users/invitations.html)
    - [SSH keys](users/ssh-keys.html)
