<?php
// Deploy Helper - runs as www-data
$dir = '/var/www/laravel.riftcore.de';
$log = "$dir/storage/logs/deploy.log";

chdir($dir);

// Log start
file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] Deploy helper: Cleaning and installing npm packages...\n", FILE_APPEND);

// Use PHP to remove node_modules recursively (works as www-data)
function removeDir($dirPath) {
    if (is_dir($dirPath)) {
        $files = scandir($dirPath);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $path = $dirPath . '/' . $file;
                if (is_dir($path)) {
                    removeDir($path);
                } else {
                    @unlink($path);
                }
            }
        }
        @rmdir($dirPath);
    }
}

if (file_exists("$dir/node_modules")) {
    file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] Removing node_modules...\n", FILE_APPEND);
    removeDir("$dir/node_modules");
}

// Run npm install
file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] Running npm install...\n", FILE_APPEND);
$output = [];
$return = 0;
exec("/usr/bin/npm ci --include=dev 2>&1", $output, $return);
file_put_contents($log, implode("\n", $output) . "\n", FILE_APPEND);

if ($return === 0) {
    file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] npm install completed successfully\n", FILE_APPEND);
} else {
    file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] npm install FAILED with code $return\n", FILE_APPEND);
}

// Run npm build - use npx to ensure npm is available
file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] Running npm build...\n", FILE_APPEND);
$output = [];
$return = 0;
// Use npx which doesn't require global npm, or use full paths
$buildCmd = "cd $dir && /usr/bin/npm run build 2>&1";
exec($buildCmd, $output, $return);
file_put_contents($log, implode("\n", $output) . "\n", FILE_APPEND);

if ($return === 0) {
    file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] npm build completed successfully\n", FILE_APPEND);
} else {
    file_put_contents($log, "[" . date('Y-m-d H:i:s') . "] npm build FAILED with code $return\n", FILE_APPEND);
}
