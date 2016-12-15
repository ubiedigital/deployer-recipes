<?php

namespace Deployer;

require_once __DIR__.'/../vendor/deployer/recipes/local.php';

set('local/bin/php', function () {
    return runLocally('which php')->toString();
});
