<?php

define('CUSTOMERS_FILE_PATH', 'registrations.csv');

function get_customers_data()
{
    $opened_file_handler = fopen(CUSTOMERS_FILE_PATH, 'r');

    $data = [];

    while (($row = fgetcsv($opened_file_handler, 1024))) {

        if (!empty($row)) {
            $data[] = $row;
        }
    }

    fclose($opened_file_handler);

    return $data;
}

$customers = get_customers_data();

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Registrants</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
    <style>
        table td{
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
        }
    </style>
</head>

<body>

    <h1>
        Registrants
    </h1>
    <h4>

        <table aria-label="Customers Dataset">
            <thead>
                <tr>
                    <th>Complete Name</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Contact Number</th>
                    <th>Sex</th>
                    <th>Program</th>
                    <th>Complete Address</th>
                    <th>Email Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($customers as $record):
                    ?>
                    <tr>
                        <td><?php echo $record[0]; ?></td>
                        <td><?php echo $record[1]; ?></td>
                        <td><?php echo $record[2]; ?></td>
                        <td><?php echo $record[3]; ?></td>
                        <td><?php echo $record[4]; ?></td>
                        <td><?php echo $record[5]; ?></td>
                        <td><?php echo $record[6]; ?></td>
                        <td><?php echo $record[7]; ?></td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
</body>

</html>