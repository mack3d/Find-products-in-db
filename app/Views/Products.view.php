<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['kodn']; ?></td>
                <td><?= $product['kod']; ?></td>
                <td><?= $product['cena']; ?></td>
                <td><?= $product['ilosc']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>