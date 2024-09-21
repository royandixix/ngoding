<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nama']; ?></td>
                <td><?php echo $item['qty']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>