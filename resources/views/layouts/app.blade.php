<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système d'Archives</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">📁 Système d'Archives</a>
            <div class="navbar-nav">
                <a class="nav-link text-white" href="/divisions">Divisions</a>
                <a class="nav-link text-white" href="/services">Services</a>
                <a class="nav-link text-white" href="/documents">Documents</a>
                <a class="nav-link text-white" href="/entrees">Entrées</a>
                <a class="nav-link text-white" href="/sorties">Sorties</a>
                <a class="nav-link text-white" href="/users">Utilisateurs</a>
                <a class="nav-link text-danger fw-bold" href="/retards">⚠️ Retards</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>