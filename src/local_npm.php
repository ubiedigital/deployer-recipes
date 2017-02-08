<?php

namespace Deployer;

set('local_npm_cache_path', function () {
    return (string)run('which npm-cache');
});
set('npm_cache_arguments', '');

task('local:npm-cache:install', function () {
    runLocally('cd {{local_release_path}} && {{local_npm_cache_path}} install {{npm_cache_arguments}}');
})->desc('NPM install');
