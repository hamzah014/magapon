<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/tweaked.css">
    <title>Details Pdf</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <p style="text-align: center;">RANKING DETAILS</p>
    <?php echo "Date:" . date("Y-m-d") . ""; ?>
    &nbsp;&nbsp;&nbsp;
    &nbsp;
    <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
    <?php echo "Time:" . date("h:i:sa") . "<br>"; ?>
    <table width="100%" border="1">
        <thead class="table-Primary">
            <tr>
                <th scope="col">Participants ID</th>
                <th scope="col">Fish Weight (KG)</th>
            </tr>
        </thead>
        <tbody class="table-light">
            <tr>
                <td>123</td>
                <td>8.90</td>
            </tr>
            <tr>
                <td>999</td>
                <td>7.21</td>
            </tr>
            <tr>
                <td>123</td>
                <td>6.24</td>
            </tr>
            <tr>
                <td>042</td>
                <td>4.35</td>
            </tr>
            <tr>
                <td>001</td>
                <td>2.43</td>
            </tr>
            <tr>
                <td>321</td>
                <td>0.32</td>
            </tr>
        </tbody>
    </table>
</body>

</html>