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

    if(!empty($_GET['filterPark']) && !empty($_GET['filterVote'])) {
        $valuePark = $_GET['filterPark'];
        $valueVote = $_GET['filterVote'];
        $filteredHotels = [];
        foreach($hotels as $hotel){
            if($hotel['parking'] === $valuePark && $hotel['vote'] == $valueVote){
                $filteredHotels[] = $hotel;
            }
        }
    } else {
        $filteredHotels = $hotels;
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="filterPark">Cerchi un hotel:</label>
        <select name="filterPark" id="filterPark">
            <option value="">...</option>
            <option value="true">Con parcheggio</option>
            <option value="false">Senza parcheggio</option>
        </select>

        <label for="filterVote">Filtra per voto:</label>
        <select name="filterVote" id="filterVote">
            <option value="">...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit">Invia</button>
    </form>

    <table class="table">
        <tbody>
            <tr>
            <th scope="row">Nome</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td><?php echo $filteredHotels[$i]['name'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row">Descrizione</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td><?php echo $filteredHotels[$i]['description'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row">Parcheggio</th>
            <?php foreach ($filteredHotels as $hotel) { ?>
                <td>
                    <?php
                        if ($hotel['parking'] === true) {
                            echo 'Sì';
                        } else {
                            echo 'No';
                        } 
                    ?>
                </td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row">Voto</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td><?php echo $filteredHotels[$i]['vote'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row">Distanza dal centro (km)</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td><?php echo $filteredHotels[$i]['distance_to_center'] ?></td>
            <?php } ?>
            </tr>
        </tbody>
    </table>
    

   
</body>
</html>