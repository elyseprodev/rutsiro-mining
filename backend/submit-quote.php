<?php
// Phase 1: fail closed until validation, persistence and notifications exist.
http_response_code(503);
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');
echo json_encode(['error' => 'This submission service is not enabled yet.']);
