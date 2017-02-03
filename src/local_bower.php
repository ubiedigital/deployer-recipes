<?php

namespace Deployer;

task('local:bower:install', function () {
    runLocally('cd {{local_release_path}} && bower install');
})->desc('Bower install');
