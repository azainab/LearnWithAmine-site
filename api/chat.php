<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit(json_encode(['error' => 'POST only']));
}

$input = json_decode(file_get_contents('php://input'), true);
$message = strtolower($message ?? $input['message'] ?? '');

$replies = [
    'f1' => 'F1 visa: Apply via US embassy. I-20 from university required. Interview tips in playlist.',
    'opt' => 'OPT: Post-F1 work auth. STEM=36mo. Apply USCIS 90 days pre-completion.',
    'cpt' => 'CPT: Curricular Practical Training. Part-time OK during studies. Employer letter needed.',
    'express entry' => 'Express Entry: CRS score 470+. Profile → ITA → PR in 6mo.',
    'pn p' => 'PNP: Provincial Nominee. Alberta AAIP, SINP streams. Faster than EE.',
    'visa' => 'US/Canada visas? Check playlist for forms (DS-160, IMM5669).'
];

$reply = 'Ask about F1, OPT, CPT, Express Entry, PNP, or visas!';
foreach ($replies as $key => $response) {
    if (strpos($message, $key) !== false) {
        $reply = $response;
        break;
    }
}

echo json_encode(['reply' => $reply]);
?>
