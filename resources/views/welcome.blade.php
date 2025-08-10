<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Use a common sans-serif font */
            background-color: #f8f9fa; /* Set a light background color */
            text-align: center; /* Center-align text */
            padding-top: 50px; /* Add some space from the top */
        }
        h1 {
            color: #0d6efd; /* Set heading color to blue */
            margin-bottom: 20px; /* Add some space below the heading */
        }
        a {
            color: #0d6efd; /* Set link color to blue */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello, {{ Auth::user()->name }}!</h1>
        <a href="logout" class="btn btn-danger mb-3">Logout</a>
        <div class="d-flex flex-column">
            <a href="frndlist" class="btn btn-primary mb-2">Add Friend</a>
            <a href="frndrequest" class="btn btn-secondary mb-2">View Friend Requests</a>
            <a href="viewfrnd" class="btn btn-info">View Your Friends</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
