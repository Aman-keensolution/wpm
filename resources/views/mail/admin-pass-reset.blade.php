<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <style>
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: #111d5c;
            padding: 20px 0 20px;
        }

        table {
            margin: 0 auto;
        }

        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #111d5c;
            color: white;
        }

        footer {
            margin: 20px 0;
            font-size: 10px;
        }

        .mail-container .message-box {
            text-align: left;
            margin: 40px 0;
        }

        .btn {
            background-color: #444;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 3px;
            display: block;
            width: 130px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mail-container">
        <div class="logo-wrapper">
            <a href="{{url('/')}}">
                <img src="{{asset('public/images/logo.jpg')}}" alt="Inventory Count System">
            </a>
        </div>
        <div class="message-box">
            @php
            $message = <p>Hello,</p>
            <p>@name</p>
            <p>@message</p>
            <p>Regards</p>
            <p>@company</p>
            $message = str_replace('@name',$data['name'],$message);
            $message = str_replace('@message',$data['message'],$message);
            $message = str_replace('@company',Inventory Count ,$message);
            @endphp
            {!! $message !!}
        </div>
        <footer>
            &copy; 'All Right Reserved By' .  ' Saga Metal '
        </footer>
    </div>
</body>

</html> 