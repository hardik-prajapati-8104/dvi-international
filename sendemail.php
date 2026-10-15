
<?php

// Accept POST requests only.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Prevent basic automated bot submissions.
if (!empty($_POST['website'] ?? '')) {
    header('Location: thank-you.php');
    exit;
}

// Collect form data.
$name = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate required fields.
if ($name === '' || $email === '' || $message === '') {
    http_response_code(400);
    exit('Please fill in all required fields.');
}

if (
    strlen($name) > 100 ||
    strlen($email) > 254 ||
    strlen($subject) > 200 ||
    strlen($message) > 10000
) {
    http_response_code(400);
    exit('One or more fields exceed the allowed length.');
}

// Validate email address.
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Please enter a valid email address.');
}

// Prevent email header injection.
if (preg_match('/[\r\n]/', $email)) {
    http_response_code(400);
    exit('Invalid email address.');
}

// DVI INTERNATIONAL email settings.
$to = 'support@dviinternational.com';
$from = 'support@dviinternational.com';

$mailSubject = 'New Website Enquiry - DVI INTERNATIONAL';

if ($subject !== '') {
    $mailSubject .= ' - ' . $subject;
}

// Safely escape user-provided content for HTML email.
$safeName = htmlspecialchars(
    $name,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

$safeEmail = htmlspecialchars(
    $email,
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

$safeSubject = htmlspecialchars(
    $subject !== '' ? $subject : 'Not provided',
    ENT_QUOTES | ENT_SUBSTITUTE,
    'UTF-8'
);

$safeMessage = nl2br(
    htmlspecialchars(
        $message,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    )
);

// Build the email.
$emailBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Website Enquiry</title>
</head>
<body style="font-family:Arial,sans-serif;color:#333;line-height:1.6;">

    <div style="max-width:650px;margin:20px auto;border:1px solid #ddd;">

        <div style="background:#1d3154;color:#fff;padding:22px;">
            <h2 style="margin:0;">DVI INTERNATIONAL</h2>
            <p style="margin:6px 0 0;">New Website Contact Enquiry</p>
        </div>

        <div style="padding:25px;">
            <p><strong>Name:</strong> ' . $safeName . '</p>
            <p><strong>Email:</strong> ' . $safeEmail . '</p>
            <p><strong>Subject:</strong> ' . $safeSubject . '</p>

            <hr style="border:0;border-top:1px solid #ddd;">

            <p><strong>Message:</strong></p>
            <p>' . $safeMessage . '</p>

            <hr style="border:0;border-top:1px solid #ddd;">

            <p style="font-size:12px;color:#777;">
                This enquiry was submitted through the
                DVI INTERNATIONAL website contact form.
            </p>
        </div>

    </div>

</body>
</html>';

// Email headers.
$headers = [];
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=UTF-8';
$headers[] = 'From: DVI INTERNATIONAL Website <' . $from . '>';
$headers[] = 'Reply-To: ' . $email;
$headers[] = 'X-Mailer: PHP/' . phpversion();

// Encode the subject for UTF-8 compatibility.
$encodedSubject = '=?UTF-8?B?' .
    base64_encode($mailSubject) . '?=';

// Attempt to send the email using PHP mail(), without SMTP.
try {
    $sent = mail(
        $to,
        $encodedSubject,
        $emailBody,
        implode("\r\n", $headers)
    );
} catch (Throwable $e) {
    $sent = false;
}

// Redirect only when PHP reports successful acceptance.
if ($sent) {
    header('Location: thank-you.php');
    exit;
}

// Report a generic failure without exposing server details.
http_response_code(500);
echo 'Sorry, your message could not be sent. Please try again later.';

?>
