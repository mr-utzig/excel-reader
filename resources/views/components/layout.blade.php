<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spreadsheet Reader</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <livewire:styles />
</head>

<body class="vw-100 vh-100 bg-light">
    <x-header />
    <main class="container d-flex flex-column my-5">
        {{ $slot }}
    </main>
    <livewire:scripts />
</body>

</html>