<?php
session_start();

// Check if the session variable for messages exists
if (!isset($_SESSION['chatMessages'])) {
    $_SESSION['chatMessages'] = array();
}

// Initialize reply variable
$reply = '';

// Check if the form has been submitted
if (isset($_POST['btnSend'])) {
    $host = "127.0.0.1";
    $port = 20205;

    $msg = trim($_POST['txtMessage']); // Trim whitespace from message input

    // Check if the message is not empty before proceeding
    if (!empty($msg)) {
        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
        if ($sock === false) {
            die("Socket creation failed: " . socket_strerror(socket_last_error()));
        }

        // Try connecting to the socket
        if (socket_connect($sock, $host, $port) === false) {
            die("Socket connection failed: " . socket_strerror(socket_last_error($sock)));
        }

        socket_write($sock, $msg, strlen($msg));

        $reply = socket_read($sock, 1924);
        $reply = trim($reply);
        $reply = "Server:\t" . str_pad($reply, 20, ' ', STR_PAD_LEFT);

        socket_close($sock);

        // Store the current message in the session variable
        $_SESSION['chatMessages'][] = array('user' => $msg, 'support' => $reply);
    } else {
        $reply = "Message cannot be empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/client.css?v=<?php echo time(); ?>">
    <title>Chat Support</title>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">Shopping Support</div>
        <div class="chat-messages">
            <?php
            // Display previous chat messages if they exist
            if (!empty($_SESSION['chatMessages'])) {
                foreach ($_SESSION['chatMessages'] as $message) {
                    echo "<div class='user-message'>" . htmlspecialchars($message['user']) . "</div>";
                    echo "<div class='support-message'>" . htmlspecialchars($message['support']) . "</div>";
                }
            }
            ?>
        </div>
        <form method="post">
            <div class="chat-input">
                <input type="text" name="txtMessage" id="txtMessage" placeholder="Type your message..." required>
                <input type="submit" name="btnSend" value="Send">
            </div>
        </form>
    </div>
</body>
</html>
