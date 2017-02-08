<?php

namespace Deployer;

task('local:npm:install', function () {
    runLocally('cd {{local_release_path}} && {{local_npm_path}} install --cache-min');
})->desc('NPM install');

set('npm_cache_arguments', '');

task('local:npm-cache:install', function () {
    runLocally('cd {{local_release_path}} && {{local_npm_cache_path}} install {{npm_cache_arguments}}');
})->desc('NPM install');
