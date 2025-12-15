<?php

function kondisiBadgeClass(string $kondisi): string
{
    $kondisi = strtolower(trim($kondisi));

    return match ($kondisi) {
        'seperti baru'         => 'bg-green-800',
        'bagus'                => 'bg-green-600',
        'layak pakai'          => 'bg-green-400',
        default                => 'bg-gray-400',
    };
}
