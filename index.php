<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
    <h1>PHP Hotel</h1>

    <form method="GET" class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="parking" value="1" <?php if (isset($_GET['parking'])) echo 'checked'; ?>>
            <label class="form-check-label">Solo con parcheggio</label>
        </div>
        <div class="mt-2">
            <label>Voto minimo:</label>
            <input type="number" name="vote" min="1" max="5" value="<?php echo $_GET['vote'] ?? ''; ?>">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Filtra</button>
        <a href="?" class="btn btn-secondary mt-2">Reset</a>
    </form>

    <?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    echo "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($hotels as $hotel) {
        if (isset($_GET['parking']) && !$hotel['parking']) continue;
        if (!empty($_GET['vote']) && $hotel['vote'] < $_GET['vote']) continue;

        $parking = $hotel['parking'] ? 'Sì' : 'No';

        echo "<tr>
                <td>{$hotel['name']}</td>
                <td>{$hotel['description']}</td>
                <td>$parking</td>
                <td>{$hotel['vote']}</td>
                <td>{$hotel['distance_to_center']} km</td>
              </tr>";
    }

    echo "</tbody></table>";
    ?>
    </div>
</body>

</html>