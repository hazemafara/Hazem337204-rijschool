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
    <!-- <?= var_dump($data['update']) ?> -->
    <?php

    use function PHPSTORM_META\type;

    // foreach ( as $row) {
    //     echo $row->Type;
    // }



    ?>
    <!-- <?= var_dump($data['allUpdatedResults']) ?> -->

    <?php ?>

    <form method="post" action="update.php">
        <label for="type">Type auto:</label>
        <select id="type" name="type" required>
            <?php
            $uniqueTypes = array(); // Array to store unique types
            $selectedValue = ''; // Initialize the selected value
            foreach ($data['update'] as $row) {
                $selectedValue = $row->Type; // Set the selected value
            }
            foreach ($data['allUpdatedResults'] as $row) {
                $type = $row->Type;
                // Check if the type is not already in the $uniqueTypes array
                if (!in_array($type, $uniqueTypes)) {
                    // Add the type to the $uniqueTypes array
                    $uniqueTypes[] = $type;

                    // Check if the current $type matches the selected value
                    $isSelected = ($type == $selectedValue) ? 'selected' : '';

                    echo '<option value="' . $type . '" ' . $isSelected . '>' . $type . '</option>';
                }
            }
            ?>
        </select><br>


        <label for="brandstof">brandstof</label>
        <select id="brandstof" name="brandstof" required>
            <?php
            $uniqueOptions = array();
            $selectedValue = ''; // Initialize the selected value
            foreach ($data['update'] as $row) {
                $selectedValue = $row->Brandstof; // Set the selected value
            }
            foreach ($data['allUpdatedResults'] as $row) {
                $brandstof = $row->Brandstof;
                if (!in_array($brandstof, $uniqueOptions)) {
                    $uniqueOptions[] = $brandstof;
                    // Check if the current $brandstof matches the selected value
                    $isSelected = ($brandstof == $selectedValue) ? 'selected' : '';
                    echo '<option value="' . $brandstof . '" ' . $isSelected . '>' . $brandstof . '</option>';
                }
            }
            ?>
        </select><br>



        <label for="kenteken">kenteken:</label>
        <select id="kenteken" name="kenteken" required>
            <?php
            $uniqueKentekens = array();
            $selectedValue = ''; // Initialize the selected value
            foreach ($data['update'] as $row) {
                $selectedValue = $row->Kenteken; // Set the selected value
            }
            foreach ($data['allUpdatedResults'] as $row) {
                $kenteken = $row->Kenteken;
                if (!in_array($kenteken, $uniqueKentekens)) {
                    $uniqueKentekens[] = $kenteken;
                    // Check if the current $kenteken matches the selected value
                    $isSelected = ($kenteken == $selectedValue) ? 'selected' : '';
                    echo '<option value="' . $kenteken . '" ' . $isSelected . '>' . $kenteken . '</option>';
                }
            }
            ?>
        </select><br>

        <label for="rijInstrecteur">rijInstrecteur:</label>
        <select id="rijInstrecteur" name="rijInstrecteur" required>
            <option>bert van sali</option>
            <option>youri van veen</option>
            <option>bert van sali</option>
            <option>li zahn</option>
            <option>leroy boerhaven</option>
        </select><br>





        <input type="submit" value="Invoeren">
    </form>

</body>

</html>