<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>Issue Tracker</title>
</head>

<body class="m-[0]">
    <nav class="flex flex-row justify-between items-center px-[20px] border-b-[1px]">
        <div class=""><a href="/" class="text-[32px] no-underline text-[#000]">IssueTracker</a></div>
        <div class="account">User</div>
    </nav>

    <section class="flex flex-row">
        <div class="w-[100%] p-[20px]">
            {{ $slot }}
        </div>
    </section>

</body>

</html>
