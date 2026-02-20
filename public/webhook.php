<?php
$log = "/var/www/laravel.riftcore.de/storage/logs/webhook.log";
file_put_contents($log, "START\n", FILE_APPEND);

$secret = "jPKrc5iXMRQF?!";
$payload = file_get_contents("php://input");
$signature = "sha256=" . hash_hmac("sha256", $payload, $secret);
$header = $_SERVER["HTTP_X_HUB_SIGNATURE_256"] ?? "";

if (!hash_equals($signature, $header)) {
    file_put_contents($log, "BAD_SIGNATURE\n", FILE_APPEND);
    http_response_code(403);
    exit("Invalid signature");
}

file_put_contents($log, "SIG_OK\n", FILE_APPEND);

// Deploy: Git + dependencies
$cmd = "nohup /var/www/laravel.riftcore.de/deploy.sh > /var/www/laravel.riftcore.de/storage/logs/deploy.log 2>&1 &";
pclose(popen($cmd, "r"));
file_put_contents($log, "CMD_LAUNCHED\n", FILE_APPEND);

// Build assets (runs as www-data via PHP, handles permission issues)
exec("php /var/www/laravel.riftcore.de/public/deploy-build.php > /dev/null 2>&1 &");
file_put_contents($log, "BUILD_LAUNCHED\n", FILE_APPEND);

if (function_exists("fastcgi_finish_request")) {
    fastcgi_finish_request();
}

echo "OK";
