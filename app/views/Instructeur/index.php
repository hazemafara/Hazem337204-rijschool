<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Instructeurs</title>
</head>

<body>
    <h1><?= $data['title'] ?></h1>
    <h2>Aantal instructeurs: <?= count($data['instructeurs']) ?></h2>

    <table border='1'>
        <thead>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Mobiel</th>
            <th>Datum in dienst</th>
            <th>Aantal sterren</th>
            <th>Voertuigen</th>
        </thead>
        <tbody>
            <?php foreach ($data['instructeurs'] as $instructeur) : ?>
                <tr>
                    <td><?= $instructeur->Voornaam ?></td>
                    <td><?= $instructeur->Tussenvoegsel ?></td>
                    <td><?= $instructeur->Achternaam ?></td>
                    <td><?= $instructeur->Mobiel ?></td>
                    <td><?= $instructeur->DatumInDienst ?></td>
                    <td><?= $instructeur->AantalSterren ?></td>
                    <td>
                        <a href="<?= URLROOT ?>/instructeur/gebruikteVoertuigen/<?= $instructeur->Id ?>">
                            <img src="/img/car.png" alt="Car" width="32" height="32">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>