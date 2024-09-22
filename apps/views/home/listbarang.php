<div class="container">
    <a href="<?php echo BASE_URL . 'index.php?r=home/insertbarang' ?>" class="btn btn-primary mt-4">Tambah Barang</a>


    <table class="table table-bordered table-hover mt-3">
        <thead class="table-dark">
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
                    <td>
                        <span class="badge text-bg-<?php echo $item['qty'] > 50 ? 'success' : 'danger'; ?>">
                            <?php echo $item['qty'] > 50 ? 'Stok Aman' : 'Stok Rendah'; ?>
                            (<?php echo $item['qty']; ?>)
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>