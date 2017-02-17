<?php

namespace Deployer;

require_once __DIR__.'/local.php';

// Symfony console bin local
set('local/bin/console', function () {
    return sprintf('{{local_release_path}}/%s/console', trim(get('bin_dir'), '/'));
});

set('assets_options', '');

task('local:js-routing:dump', function () {
    runLocally('{{env_vars}} {{local/bin/php}} {{local/bin/console}} fos:js-routing:dump {{console_options}}');
})->desc('Dump fos-js routes');

task('local:assets:install', function () {
    runLocally('{{env_vars}} {{local/bin/php}} {{local/bin/console}} assets:install {{console_options}} {{assets_options}} {{local_release_path}}/web');
})->desc('Install bundle assets');
