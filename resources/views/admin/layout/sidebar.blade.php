<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
        }
        #sidebar {
            width: 250px;
            height: 100vh;
            background: #f8f9fa;
            padding: 20px;
        }
        #content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            background: #ffffff;
        }
        .nav-link {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <h4>Dashboard</h4>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{route('show.dashboard.admin')}}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.users.admin')}}">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.agents.admin')}}">Agents</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.properties.admin')}}">Properties</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.rates.admin')}}">Rates</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.reviews.admin')}}">Reviews</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('show.request_agents.admin')}}">Request Agents</a></li>
        </ul>
    </div>
    <div id="content">
        @yield('content')
    </div>
</html>
