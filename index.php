<?php 
    include __DIR__.'/partials/vars.php';
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
                    <form action="dashboard.php" method="get">
                        <div class="row">
                            <div class="col-6 py-2">
                                <label for="control-label" class="form-label"></label>
                                <input type="text" class="form-control" name="paragraph" id="my_paragraph" required>
                            </div>
                            <div class="col-12 py-3 pb-5">
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
                                <th scope="col">Voto</th>
                                <th scope="col">Distanza dal centro</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($hotels as $hotel) { ?>        
                                <tr>
                                <th scope="row"><?php echo $hotel ['name']; ?></th>
                                <td><?php echo $hotel ['description']; ?></td>
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