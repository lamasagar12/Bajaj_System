<?php include 'includer/header.php'; ?>

    <title>Thank You</title>

    <style>
        .jumbotron {
            background-color: #f8f9fa; /* Light gray */
            padding: 2rem 1rem;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1);
        }

        .jumbotron hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border-width: 2px;
            color: #343a40; /* Dark gray */
        }

        .jumbotron p {
            font-size: 1.2rem;
            color: #6c757d; /* Dark gray */
        }

        .jumbotron a {
            color: #007bff; /* Blue */
            text-decoration: none;
        }

        .jumbotron a:hover {
            color: #0056b3; /* Darker blue */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead">We have received your message and will get back to you shortly.</p>
            <hr>
            <p>If you need immediate assistance, please <a href="contactus.php">contact us</a>.</p>
            <p class="lead">
                <a class="btn btn-primary btn-sm text-light" href="index.php" role="button">Return to Home</a>
            </p>
        </div>
    </div>

    <?php include 'includer/footer.php'; ?>
</body>
</html>
