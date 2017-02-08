<?php

namespace Deployer;

set('local_gulp_path', function () {
    return (string)runLocally('which gulp');
});
set('gulp_task', 'build');

task('local:gulp:build', function() {
    runLocally('cd {{local_release_path}} && {{local_gulp_path}} {{gulp_task}}');
})->desc('Gulp build');
