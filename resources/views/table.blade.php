<?php



?>

<!DOCTYPE html>
<html>

<head>
    <title>Table Page</title>
    <link rel="stylesheet" href="/css/main.css">
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

    <div id="msgbox" class="msgbox">{{ session('del') }}</div> 
    <script>
        window.onload = function() {
            // Select the message box element
            var msgBox = document.getElementById("msgbox");
    
            // Check if the message box exists
            if (msgBox) {
                // Set a timeout to close the message box after 3000 milliseconds (3 seconds)
                setTimeout(function() {
                    // Hide the message box
                    msgBox.style.display = "none";
                }, 3000);
            }
        };
    </script>  
    
    <table class="table">
        <tr>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">id</td>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">name</td>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">email</td>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">gender</td>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">birthday</td>
            <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">created_at</td>
        </tr>

    <!-- start of foreach loop ("Variable name from controller when passing the Array's value" as "New assigned variable name as to represent the value in Array") -->
    @foreach ($ActiveUsers as $ActiveUser )

    <tr>
        <td>{{$ActiveUser->id}}</td>
        <td>{{$ActiveUser->name}}</td>
        <td>{{$ActiveUser->email}}</td>
        <td>{{$ActiveUser->gender}}</td>
        <td>{{$ActiveUser->birthday}}</td>
        <td>{{$ActiveUser->created_at}}</td>
        <td>
            <a href="{{url('delete/'.$ActiveUser->id)}}"><button id="Button2">DELETE</button></a>
        </td>
    </tr>

    @endforeach
    </table>

    </body>

</html>