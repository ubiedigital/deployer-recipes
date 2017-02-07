<?php

namespace Deployer;

set('gulp_task', 'build');

task('local:gulp:build', function() {
    runLocally('cd {{local_release_path}} && gulp {{gulp_task}}');
})->desc('Gulp build');
