<?php

namespace Deployer;

require_once 'recipe/symfony.php';

task('deploy:create_log_dir', function () {
    // Set cache dir
    set('log_dir', '{{release_path}}/' . trim(get('var_dir'), '/') . '/logs');

    // Remove cache dir if it exist
    run('if [ -d "{{log_dir}}" ]; then rm -rf {{log_dir}}; fi');

    // Create cache dir
    run('mkdir -p {{log_dir}}');

    // Set rights
    run("chmod -R g+w {{log_dir}}");
})->desc('Create cache dir');

task('doctrine:schema:update', function () {
    run('{{env_vars}} {{bin/php}} {{bin/console}} doctrine:schema:update --force {{console_options}}');
});
