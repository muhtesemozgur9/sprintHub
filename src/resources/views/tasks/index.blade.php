<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Planning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center">Task Planlama</h1>
    <h3 class="text-center text-success">Toplam Minimum Hafta: {{ $totalWeeks }}</h3>

    <div class="row mt-4">
        @foreach ($plan as $developer)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5>{{ $developer['name'] }}</h5>
                    </div>
                    <div class="card-body">
                        <h6>Kalan Çalışma Saati: {{ $developer['hours'] }} saat</h6>
                        <ul class="list-group mt-3">
                            @foreach ($developer['assigned_tasks'] as $task)
                                <li class="list-group-item">
                                    <strong>Görev Adı:</strong> {{ $task->task_name }}<br>
                                    <strong>Süre:</strong> {{ $task->duration }} saat<br>
                                    <strong>Zorluk:</strong> {{ $task->difficulty }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
