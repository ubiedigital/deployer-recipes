<?php

namespace Deployer;

task('local:gulp:build', function() {
    runLocally('cd {{local_release_path}} && gulp build');
})->desc('Gulp build');
