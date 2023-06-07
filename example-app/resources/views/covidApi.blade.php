<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>covidAPI</title>
</head>

<body>
    <h2>Global</h2>
    <div>

        <?php
        echo 'NewConfirmed: ' . $data['Global']['NewConfirmed'] . '<br>';
        echo 'TotalConfirmed: ' . $data['Global']['TotalConfirmed'] . '<br>';
        echo 'NewDeaths: ' . $data['Global']['NewDeaths'] . '<br>';
        echo 'TotalDeaths: ' . $data['Global']['TotalDeaths'] . '<br>';
        echo 'NewRecovered: ' . $data['Global']['NewRecovered'] . '<br>';
        echo 'TotalRecovered: ' . $data['Global']['TotalRecovered'] . '<br><br>';
        ?>
    </div>
    <h2>Country</h2>
    <div>
        <?php
        usort($data['Countries'], function ($a, $b) {
            return $b['TotalDeaths'] - $a['TotalDeaths'];
        });
        foreach ($data['Countries'] as $country) {
            echo 'Country: ' . $country['Country'] . '<br>';
            echo 'CountryCode: ' . $country['CountryCode'] . '<br>';
            echo 'Slug: ' . $country['Slug'] . '<br>';
            echo 'NewConfirmed: ' . $country['NewConfirmed'] . '<br>';
            echo 'TotalConfirmed: ' . $country['TotalConfirmed'] . '<br>';
            echo 'NewDeaths: ' . $country['NewDeaths'] . '<br>';
            echo 'TotalDeaths: ' . $country['TotalDeaths'] . '<br>';
            echo 'NewRecovered: ' . $country['NewRecovered'] . '<br>';
            echo 'TotalRecovered: ' . $country['TotalRecovered'] . '<br>';
            echo 'Date: ' . $country['Date'] . '<br><br>';
        }
        ?>
    </div>

</body>

</html>
