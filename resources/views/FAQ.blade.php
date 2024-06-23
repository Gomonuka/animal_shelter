<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="{{asset('css/FAQ.css')}}">
</head>
<body>
    <div class="container">
        <div class="faq-section">
            <h1>Frequently Asked Questions</h1>
            <h2>How to Use the App</h2>
            <p><strong>Q: What can I do as an unregistered user?</strong></p>
            <p>A: You can view all animals available for adoption, but cannot apply to adopt them.</p>

            <p><strong>Q: How do I view different categories of animals?</strong></p>
            <p>A: To view different categories of animals, click on the "Categories" link in the navigation bar.</p>

            <p><strong>Q: How do I register or login?</strong></p>
            <p>A: To register or login, click on the respective "Register" or "Login" link in the navigation bar.</p>

            <p><strong>Q: How can I become a volunteer?</strong></p>
            <p>A: To become a volunteer, you first need to register and then fill out an application form.</p>

            <button onclick="window.location.href='{{ url('/') }}'">Return to Welcome Page</button>
        </div>
    </div>
</body>
</html>

