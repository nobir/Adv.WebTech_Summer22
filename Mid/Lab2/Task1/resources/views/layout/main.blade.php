<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$page_title}} | Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        a {
            display: block;
        }

        ul {
            list-style-type: none;
            padding: 0;
            background-color: cadetblue;
        }
        
        ul > li {
            display: inline-block;
            margin-right: 5px;
        }

        ul > li:last-child {
            margin-right: 0;
        }

        ul > li > a {
            color: black;
            text-decoration: none;
            padding: 10px 20px;
        }

        table,
        td,th {
            padding: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('service')}}">Product</a></li>
            <li><a href="{{route('aboutus')}}">About us</a></li>
            <li><a href="{{route('ourteam')}}">Our Team</a></li>
            <li><a href="{{route('contactus')}}">Contact us</a></li>
        </ul>
    </nav>

    @yield('content')
</body>

</html>