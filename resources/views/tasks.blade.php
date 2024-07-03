<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato', sans-serif;
            padding-top: 20px;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 0;
        }
        .container {
            max-width: 1250px;
            margin: auto;
            padding: 20px;
            flex: 1;
        }
        .logo {
            padding-bottom: 20px;
        }
        .table {
            margin-top: 10px;
            background-color: #fff;
            padding: 70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            margin-top: 10px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table .btn {
            padding: 5px 10px;
        }
        .footer {
            padding: 50px;
            text-align: center;
            background-color: #f8f8f8;
            margin-bottom: 300px;
        }
        .banner {
            background-color: black;
            height: 20px;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="banner"></div>
<div class="container">
    <img src="{{ asset('assets/logo.png') }}" alt="MLP Logo" class="logo">
    @yield('content')
</div>
<div class="footer">
    Copyright © 2020 All Rights Reserved.
</div>
</body>
</html>
