<?php
require_once __DIR__ . '/../includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit;
}

$subs = store('newsletter_subscribers');
$existing = $subs->where('email', $email);
if ($existing) {
    echo json_encode(['success' => false, 'message' => 'You are already subscribed.']);
} else {
    $subs->insert(['email' => $email]);
    echo json_encode(['success' => true, 'message' => 'Thank you for subscribing!']);
}
