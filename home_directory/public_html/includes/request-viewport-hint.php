<?php

/**
 * Coarse server-side guess for "phone class" clients. Useful only for optional
 * server-rendered variants; real layout should still use CSS (and resize-safe JS).
 */
function logohomes_request_hints_coarse_mobile(): bool
{
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if ($ua === '') {
        return false;
    }

    return (bool) preg_match(
        '/Mobile|Android.*Mobile|iPhone|iPod|IEMobile|webOS|BlackBerry|Opera Mini/i',
        $ua
    );
}
