<?php
header('Content-Type: application/json');
header('X-GitHub-Event: ' . ($_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'unknown'));

$payload = file_get_contents('php://input');
$sig = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

file_put_contents('/var/www/learnwithamine-site/webhook.log', 
    date('Y-m-d H:i:s') . " Event: {$_SERVER['HTTP_X_GITHUB_EVENT']}\n" .
    "Signature: $sig\nPayload preview: " . substr($payload, 0, 500) . "\n---\n", 
    FILE_APPEND | LOCK_EX);

http_response_code(200);
echo json_encode([
    'status' => 'success',
    'event' => $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'ping',
    'timestamp' => date('c')
]);
?>
