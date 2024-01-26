<?php
$Email = "";

    if (isset($_POST["submitBtn"])) { 
        $email = $_REQUEST['email'];         
    } 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Submission Form</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

    <body class="container-fluid">
    
        <div class="header">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link" aria-current="page">Home Page</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="{{ route('form') }}" class="nav-link active" aria-current="page">Submisson Form</a>
                    </li>
                </ul>
            </header>
        </div>

        <form onsubmit="return saveData()" action="{{ route('store', ['Email' => $Email]) }}" method="POST" id="submission">
            @csrf
            <label for="name" class="form-label">Please Enter Your Full Name:</label>
            <input type="text" id="name" class="form-control" name="name" required>

            <label for="email" class="form-label">Please Enter Your Email Address:</label>
            <input type="email" id="email" class="form-control" name="email" required>

            <label for="password" class="form-label">Please Enter Your Password:</label>
            <input type="password" id="password" class="form-control" name="password" required minlength="8" 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <br>

            <label for="Gender" class="form-label">Please Select Your Gender:</label>
            <br>
            <select id="Gender" name="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <br>
            <br>

            <label for="birthday" class="form-label">Please Enter Your Birth Date:</label>
            <br>
            <input type="date" id="birthday" name="birthday" required>
            <br>
            <br>

            <label for="active" class="form-label">Active Status? :</label>
            <br>
                <input type="radio" id="status" name="status" value="Yes" required>
                <label for="active">Yes</label><br>
                <input type="radio" id="status" name="status" value="No">
                <label for="not active">No</label><br>

                <input id="Button1" name="submitBtn" type="submit" value="Submit">

        </form>

        <div class="btn">
            <form action="{{ url('/table') }}" method="GET">
                <input id="Button2" type="submit" value="User Lists">
            </form>
        </div>

        <div class="msgbox2">{{ session('err') }}</div>
            
    </body>
</html>