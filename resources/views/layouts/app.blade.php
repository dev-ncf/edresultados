<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Resultados | UniRovuma</title>
    <link rel="shortcut icon" href="{{ asset('img/logotipo-unirovuma.fw.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">
    @yield('content')


@if ($errors->any()) @include('error') @endif
@if (session('success')) @include('success') @endif
</body>
</html>