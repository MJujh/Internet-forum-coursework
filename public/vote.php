<?php
// vote.php: Handles upvote/downvote for a question via AJAX
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionId = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $action = $_POST['action'] ?? '';
    if ($questionId && ($action === 'upvote' || $action === 'downvote')) {
        // Get current vote
        $question = getQuestionById($pdo, $questionId);
        if (!$question) {
            echo json_encode(['success' => false, 'error' => 'Question not found']);
            exit;
        }
        $currentVote = intval($question['vote']);
        if ($action === 'upvote') {
            $newVote = $currentVote + 1;
        } else {
            $newVote = $currentVote - 1;
        }
        // Update in DB
        $stmt = $pdo->prepare('UPDATE question SET vote = :vote WHERE id = :id');
        $stmt->execute(['vote' => $newVote, 'id' => $questionId]);
        echo json_encode(['success' => true, 'vote' => $newVote]);
        exit;
    }
}
echo json_encode(['success' => false, 'error' => 'Invalid request']);
