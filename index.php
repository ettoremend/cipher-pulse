<?php
$target = filter_input(INPUT_GET, 'target', FILTER_SANITIZE_URL) ?: 'https://example.com';
$escaped_target = escapeshellarg($target);

// Executa o script Python
$command = "python3 engine/scanner.py " . $escaped_target;
$raw_output = shell_exec($command);
$data = json_decode($raw_output, true) ?: [];
$score = $data['score'] ?? 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CipherPulse // Security Operations Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="dashboard-container">
        <header class="navbar">
            <div class="logo">CIPHER<span>PULSE</span></div>
            <form method="GET" class="search-box">
                <input type="text" name="target" value="<?= htmlspecialchars($target) ?>" placeholder="Target Domain (ex: target.com)">
                <button type="submit">AUDITAR</button>
            </form>
        </header>

        <main class="grid-layout">
            <div class="card score-card">
                <h3>Pontuação de Segurança</h3>
                <div class="score-circle <?= $score < 60 ? 'critical' : ($score < 85 ? 'warning' : 'good') ?>">
                    <span><?= $score ?></span>/100
                </div>
                <p>Status HTTP: <strong><?= $data['status'] ?? 'N/A' ?></strong></p>
            </div>

            <div class="card headers-card">
                <h3>Cabeçalhos Ausentes (Vulnerabilidades)</h3>
                <ul>
                    <?php if (!empty($data['missing_headers'])): ?>
                        <?php foreach ($data['missing_headers'] as $header): ?>
                            <li class="badge-danger">⚠️ <?= htmlspecialchars($header) ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="badge-success">✔ Todos os cabeçalhos recomendados estão presentes!</li>
                    <?php endif; ?>
                </ul>
            </div>
        </main>
    </div>
</body>
</html>
