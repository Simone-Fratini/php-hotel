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

    $counter = 1;

    $parkingFilter = false;
    $voteFilter = 0;

    if(isset($_GET["parking"]) && $_GET["parking"] == "on"){
        $parkingFilter = true;
    }
    if(isset($_GET["vote"])){
        $voteFilter = $_GET["vote"];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-Hotel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container py-5">
        <h1 class="text-success text-center mb-5">PHP-HOTEL</h1>

        <div class="card mb-4 p-4">
            <h2 class="h4 mb-3">Filters</h2>

            <form action="./index.php" class="row align-items-end g-3">
                <div class="col-md-4">
                    <div class="form-check">
                        <input type="checkbox" name="parking" id="parking" class="form-check-input">
                        <label for="parking" class="form-check-label">Parking Available</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="vote" class="form-label">Minimum Rating</label>
                    <input type="number" name="vote" id="vote" min="0" max="10" value="0" class="form-control">
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search Hotels</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                    </tr>
                </thead>
                <tbody>

            <?php
                foreach($hotels as $hotel){

                    
                    if($parkingFilter){
                        if(!$hotel["parking"]){
                            continue;
                        }
                    }
                    if($voteFilter > $hotel["vote"]){
                        continue;
                    }

                    
            ?>
                <tr>
                <th scope="row"><?php echo $counter ?></th>
                <td class="fw-bold"><?php echo $hotel["name"] ?></td>
                <td><?php echo $hotel["description"] ?></td>
                <td><?php echo $hotel["parking"] == true ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>' ?></td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-2 ">
                            <?php echo $hotel["vote"] ?>
                        </div>
                    </div>
                </td>
                <td><?php echo $hotel["distance_to_center"]."km" ?></td>
                
                </tr>
                

            <?php
                    
                $counter++;
                }
            ?>
            </tbody>
        



        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>