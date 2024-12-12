<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // อีเมลที่ต้องการส่งไป
    $to = "matachai121a@gmail.com";

    // หัวข้ออีเมล
    $subject = "Contact Form Message from $name";

    // เนื้อหาอีเมล
    $body = "You have received a new message from the contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";

    // Header สำหรับการส่งอีเมล
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // ใช้ฟังก์ชัน mail() ส่งอีเมล
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>