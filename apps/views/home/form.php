<div class="container">
    <form action="<?php echo BASE_URL . 'index.php?r=home/insertbarang'; ?>" method="POST">
        <div class="form-group">
            <label for="inputNama">Nama Barang</label>
            <input type="text" name="nama" class="form-control" id="inputNama" aria-describedby="namaHelp" required>
            <small id="namaHelp" class="form-text text-muted">Isikan nama barang</small>
        </div>

        <div class="form-group">
            <label for="inputJumlah">Jumlah</label>
            <input type="number" name="qty" class="form-control" id="inputJumlah" aria-describedby="jumlahHelp" required>
            <small id="jumlahHelp" class="form-text text-muted">Isikan jumlah barang</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo BASE_URL . 'index.php?r=home/listbarang'; ?>" class="btn btn-secondary">Kembali ke Daftar Barang</a>
    </form>
</div>
