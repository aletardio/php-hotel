<?php 
    include __DIR__.'/partials/vars.php';

    // Inizializzazione della variabile con tutti gli hotel
    $filteredHotels = $hotels;

    // Inizializzazione delle variabili con il valore del parametro 'parking' e 'vote se è presente
    $selectedParking = isset($_GET['parking']) ? $_GET['parking'] : '';
    $selectedVote = isset($_GET['vote']) ? $_GET['vote'] : '';

    // Verifica del parametro 'parking' e 'vote'
    if ($selectedParking !== '' || $selectedVote !== '') {

        $filteredHotels = [];
        
        foreach ($hotels as $hotel) {
            $parkingCondition = false;
            $voteCondition = false;
        
            // Condizione per il filtro sul parcheggio
            if ($selectedParking === '') {
                $parkingCondition = true;
            } 
            elseif ($selectedParking === 'true' && $hotel['parking']) {
                $parkingCondition = true;  // Solo con parcheggio
            } 
            elseif ($selectedParking === 'false' && !$hotel['parking']) {
                $parkingCondition = true;  // Solo senza parcheggio
            }
        
            // Condizione per il filtro sul voto
            if ($selectedVote === '') {
                $voteCondition = true;
            } 
            elseif ($hotel['vote'] >= (int)$selectedVote) {
                $voteCondition = true;
            }
        
            // Aggiunge l'hotel filtrato alla lista se entrambe le condizioni sono vere
            if ($parkingCondition && $voteCondition) {
                $filteredHotels[] = $hotel;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
    <body>
        <!-- HEADER -->
        <?php include __DIR__.'/partials/template/header.php';?>

        <!-- MAIN -->
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <form action="./index.php" method="get">
                        <div class="row">
                            <div class="col-5 py-2 pb-5">
                                <label for="parking"></label>
                                <select name="parking" class="form-select">
                                    <option value="" <?php echo $selectedParking === '' ? 'selected' : ''; ?>>Tutti</option>
                                    <option value="true" <?php echo $selectedParking === 'true' ? 'selected' : ''; ?>>Con parcheggio</option>
                                    <option value="false" <?php echo $selectedParking === 'false' ? 'selected' : ''; ?>>Senza parcheggio</option>
                                </select>
                            </div>
                            <div class="col-5 py-2 pb-5">
                                <label for="vote"></label>
                                <select name="vote" class="form-select">
                                    <option value="" <?php echo $selectedVote === '' ? 'selected' : ''; ?>>Tutti</option>
                                    <option value="3" <?php echo $selectedVote === '3' ? 'selected' : ''; ?>>3 stelle</option>
                                    <option value="4" <?php echo $selectedVote === '4' ? 'selected' : ''; ?>>4 stelle</option>
                                    <option value="5" <?php echo $selectedVote === '5' ? 'selected' : ''; ?>>5 stelle</option>
                                </select>
                            </div>
                            <div class="col-2 py-2 pb-5">
                                <button type="submit" class="btn btn-sm btn-primary">Filtra</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Parcheggio</th>
                                <th scope="col">Voto</th>
                                <th scope="col">Distanza dal centro</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($filteredHotels as $hotel) { ?>        
                                <tr>
                                <td><?php echo $hotel ['name']; ?></td>
                                <td><?php echo $hotel ['description']; ?></td>
                                <td><?php echo ($hotel ['parking'] == 'true') ? 'Si' : 'No'; ?></td>
                                <td><?php echo $hotel ['vote']; ?></td>
                                <td><?php echo $hotel ['distance_to_center']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <?php include __DIR__.'/partials/template/footer.php'; ?>
    </body>
</html>