<?php
require_once '../config/connection.php';
require_once '../utils/helper.php';
require_once '../utils/protection.php';

requireLogin();
validatePostRequest();

$userId = getCurrentUserId();
$itemId = $_POST['item_id'] ?? '';

if (empty($itemId)) {
    $_SESSION['error'] = 'Item ID required';
    redirect('../../frontend/katalog.php');
}

try {
    setUserContext($pdo, $userId);

    $stmt = $pdo->prepare("SELECT foto, user_id FROM item WHERE item_id = ?");
    $stmt->execute([$itemId]);
    $item = $stmt->fetch();

    if (!$item) {
        $_SESSION['error'] = 'Item not found';
        redirect('../../frontend/katalog.php');
    }

    if ($item['user_id'] !== $userId) {
        $_SESSION['error'] = 'Unauthorized action';
        redirect('../../frontend/katalog.php');
    }

    $stmt = $pdo->prepare("DELETE FROM item WHERE item_id = ? AND user_id = ?");
    $stmt->execute([$itemId, $userId]);

    if ($item['foto'] !== 'default.jpg' && file_exists('../../assets/items/' . $item['foto'])) {
        unlink('../../assets/items/' . $item['foto']);
    }

    $_SESSION['success'] = 'Item deleted successfully!';
    redirect('../../frontend/katalog.php');

} catch (PDOException $e) {
    $_SESSION['error'] = 'Failed to delete item';
    redirect('../../frontend/katalog.php');
}
?>
