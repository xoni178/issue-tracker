<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Issue Tracker</title>
</head>
<body class="m-[0]">
    <nav class="flex flex-row justify-between items-center px-[20px] border-b-[1px]">
            <div class=""><h2 class="text-l">IssueTracker</h2></div>
            <div class="account">User</div>
    </nav>

    <section class="flex flex-row">
         <x-sidebar></x-sidebar>
         <div class="w-[100%] p-[20px]">
            {{ $slot }}
        </div>
    </section>
   
</body>
</html>