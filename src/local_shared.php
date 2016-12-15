<?php

namespace Deployer;

require_once __DIR__.'/local.php';

task('local:shared', function () {
    $sharedPath = "{{local_deploy_path}}/shared";

    foreach (get('shared_dirs') as $dir) {
        // Check if shared dir does not exists.
        if (!test("[ -d $sharedPath/$dir ]")) {
            // Create shared dir if it does not exist.
            runLocally("mkdir -p $sharedPath/$dir");

            // If release contains shared dir, copy that dir from release to shared.
            if (test("[ -d $(echo {{local_release_path}}/$dir) ]")) {
                runLocally("cp -rv {{local_release_path}}/$dir $sharedPath/" . dirname($dir));
            }
        }

        // Remove from source.
        runLocally("rm -rf {{local_release_path}}/$dir");

        // Create path to shared dir in release dir if it does not exist.
        // Symlink will not create the path and will fail otherwise.
        runLocally("mkdir -p `dirname {{local_release_path}}/$dir`");

        // Symlink shared dir to release dir
        runLocally("{{bin/symlink}} $sharedPath/$dir {{local_release_path}}/$dir");
    }

    foreach (get('shared_files') as $file) {
        $dirname = dirname($file);
        // Remove from source.
        runLocally("if [ -f $(echo {{local_release_path}}/$file) ]; then rm -rf {{local_release_path}}/$file; fi");

        // Ensure dir is available in release
        runLocally("if [ ! -d $(echo {{local_release_path}}/$dirname) ]; then mkdir -p {{local_release_path}}/$dirname;fi");

        // Create dir of shared file
        runLocally("mkdir -p $sharedPath/" . $dirname);

        // Touch shared
        runLocally("touch $sharedPath/$file");

        // Symlink shared dir to release dir
        runLocally("{{bin/symlink}} $sharedPath/$file {{local_release_path}}/$file");
    }
});
