<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">📝 Blog CRUD</a>
            <a class="btn btn-success btn-sm" href="{{ route('posts.create') }}">+ Post Baru</a>
        </div>
    </nav>

    <main class="container pb-5">

        {{-- Flash message sukses / gagal --}}
        @if (session('success'))
            <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @if (session('error'))
            <x-alert type="danger">{{ session('error') }}</x-alert>
        @endif

        @if ($errors->any())
            <x-alert type="danger">Periksa kembali form, ada isian yang belum benar!</x-alert>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>