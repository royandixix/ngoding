<div class="container">
    <form method="POST">
        <div class="form-group">
            <!-- Menambahkan name="id" pada input hidden -->
            <?php if (isset($data['id'])) : ?>
                <input type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>">
            <?php endif; ?>
            <label for="inputNama">Nama Barang</label>
            <input type="text" name="nama" class="form-control" id="inputNama" aria-describedby="namaHelp" required value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>">
            <small id="namaHelp" class="form-text text-muted">Isikan nama barang</small>
        </div>

        <div class="form-group">
            <label for="inputJumlah">Jumlah</label>
            <!-- Menghapus tanda `>` yang tidak perlu -->
            <input type="number" name="qty" class="form-control" id="inputJumlah" aria-describedby="jumlahHelp" required value="<?php echo isset($data['qty']) ? $data['qty'] : ''; ?>">
            <small id="jumlahHelp" class="form-text text-muted">Isikan jumlah barang</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo BASE_URL . 'index.php?r=home/listbarang'; ?>" class="btn btn-secondary">Kembali ke Daftar Barang</a>
    </form>
</div>