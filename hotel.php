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
        $valuePark = ($_GET['filterPark'] == 'si') ? true : false;
        $valueVote = $_GET['filterVote'];
        $filteredHotels = [];
        foreach($hotels as $hotel){
            if($hotel['parking'] == $valuePark && $hotel['vote'] == $valueVote){
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
    <link rel="stylesheet" href="./style.css">
    <title>PHP Hotel</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" class="container d-flex flex-column align-items-center">
        <label for="filterPark" class="mt-5 fs-2">Cerchi un hotel:</label>
        <select name="filterPark" id="filterPark" class="mt-3">
            <option value="">...</option>
            <option value="si">Con parcheggio</option>
            <option value="no">Senza parcheggio</option>
        </select>

        <label for="filterVote" class="mt-5 fs-2">Filtra per voto:</label>
        <select name="filterVote" id="filterVote" class="mt-3">
            <option value="">...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit" class="mt-5">Invia</button>
    </form>

    <table class="table mt-5 container border-dark">
        <tbody>
            <tr>
            <th scope="row" class="border-dark border text-center align">Nome</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td class="border-dark border text-center align"><?php echo $filteredHotels[$i]['name'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row" class="border-dark border text-center align">Descrizione</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td class="border-dark border text-center align"><?php echo $filteredHotels[$i]['description'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row" class="border-dark border text-center align">Parcheggio</th>
            <?php foreach ($filteredHotels as $hotel) { ?>
                <td class="border-dark border text-center align">
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
            <th scope="row" class="border-dark border text-center align">Voto</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td class="border-dark border text-center align"><?php echo $filteredHotels[$i]['vote'] ?></td>
            <?php } ?>
            </tr>
            <tr>
            <th scope="row" class="border-dark border text-center align">Distanza dal centro (km)</th>
            <?php for($i = 0;$i < count($filteredHotels); $i++ ) { ?>
                <td class="border-dark border text-center align"><?php echo $filteredHotels[$i]['distance_to_center'] ?></td>
            <?php } ?>
            </tr>
        </tbody>
    </table>
    

   
</body>
</html>