<?php

namespace Deployer;

require_once 'vendor/deployer/recipes/local.php';

set('local/bin/php', function () {
    return runLocally('which php')->toString();
});
