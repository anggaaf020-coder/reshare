<?php

function getUserBadge(mysqli $conn, int $userId): ?string
{
    $sql = "
        SELECT user_id, COUNT(id) AS total_upload
        FROM items
        GROUP BY user_id
        ORDER BY total_upload DESC
        LIMIT 3
    ";

    $result = $conn->query($sql);
    if (!$result) return null;

    $rank = 1;
    while ($row = $result->fetch_assoc()) {
        if ((int)$row['user_id'] === $userId) {
            return match ($rank) {
                1 => 'top_1',
                2 => 'top_2',
                3 => 'top_3',
                default => null
            };
        }
        $rank++;
    }

    return null;
}
