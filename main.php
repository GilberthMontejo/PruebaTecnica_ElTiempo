<?php
#$data = file_get_contents("./datos.json");
$data = file_get_contents("https://images-api.nasa.gov/search?q=apollo%2011");
$products = json_decode($data, true);
$products = $products['collection']['items'];
$value = count($products)-1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Técnica</title>

    <style>
        table, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
        </thead>
        <tbody>
            <?php for($i=0; $i<=10; $i++) {?>
            <tr>
                <td><?php print_r($products[$i]['data'][0]['title']); ?></td>
                <td><?php print_r($products[$i]['data'][0]['description'])?></td>
                <td>
                    <img src="<?php echo $products[$i]['links'][0]['href']; ?>" 
                    alt="<?php echo $products[$i]['links'][0]['render']; ?>">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>