<?php
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <script src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container-fluid">
    
    <div class="header">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link active" aria-current="page">Home Page</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('form') }}" class="nav-link" aria-current="page">Submisson Form</a>
                </li>
            </ul>
        </header>
    </div>

        <div class="content">
            <p id="main">&#128075 Welcome!</p>
            <p id="sub">You may submit your data in submission form above.</p>
        </div>

        <div class="msgbox" id="success">{{ session('msg') }}</div>

    </body>

</html>