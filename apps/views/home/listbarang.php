<div class="container mt-5">
    <h2 class="mb-4">Daftar Barang</h2>
    <table class="table table-hover table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?php echo $item['id']; ?></td>
                        <td><?php echo $item['nama']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Tidak ada data yang ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-4">
        <button class="btn btn-primary" onclick="window.location.href='tambah_barang.php'">Tambah Barang</button>
        <button class="btn btn-success">Cetak Daftar</button>
    </div>
</div>
