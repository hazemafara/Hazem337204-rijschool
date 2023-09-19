<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <title>Voertuigen</title>
</head>

<body>
    <h1><?= $data['title']; ?></h1>

    <p><?= $data['instructeur']->Voornaam ?> <?= $data['instructeur']->Tussenvoegsel ?> <?= $data['instructeur']->Achternaam ?></p>
    <p><?= $data['instructeur']->DatumInDienst ?></p>
    <p><?= $data['instructeur']->AantalSterren ?></p>

    <?php if (empty($data["voertuigen"])) : ?>
        <h3>Er zijn op dit moment nog geen vrije voertuigen.</h3>
    <?php else : ?>
        <table border='1'>
            <thead>
                <th>Type Voertuig</th>
                <th>Type</th>
                <th>Kenteken</th>
                <th>Bouwjaar</th>
                <th>Brandstof</th>
                <th>Rijbewijscategorie</th>
                <th>Toevoegen</th>
            </thead>
            <tbody>
                <?php foreach ($data['voertuigen'] as $voertuig) : ?>
                    <!-- <?php var_dump($data['instructeur']) ?> -->
                    <tr>
                        <td><?= $voertuig->TypeVoertuig ?></td>
                        <td><?= $voertuig->Type ?></td>
                        <td><?= $voertuig->Kenteken ?></td>
                        <td><?= $voertuig->Bouwjaar ?></td>
                        <td><?= $voertuig->Brandstof ?></td>
                        <td><?= $voertuig->Rijbewijscategorie ?></td>
                        <td><a href="/instructeur/voegToe/<?= $data['instructeur']->Id ?>/<?= $voertuig->Id ?>">Add</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</body>

</html>