<?php

namespace Deployer;

task('local:npm:install', function () {
    runLocally('cd {{local_release_path}} && {{local_npm_path}} install --cache-min');
})->desc('NPM install');
