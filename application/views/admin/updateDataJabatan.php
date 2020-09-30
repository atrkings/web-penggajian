
    <div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
</div>

<div class="card" style="width: 60%; margin-bottom:100px">
    <div class="card-body">
        <form method="POST" action="<?= base_url('admin/dataJabatan/tambahDataAksi')?>">

            <div class="form-group">
                <label>Nama Jabatan</label>
                <input type="text" name="nama_jabatan" class="form-control">
                    <?= form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
                </input>
            </div>

            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="text" name="gaji_pokok" class="form-control">
                    <?= form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
                </input>
            </div>

            <div class="form-group">
                <label>Gaji Lembur</label>
                <input type="text" name="gaji_lembur" class="form-control">
                    <?= form_error('gaji_lembur','<div class="text-small text-danger"></div>') ?>
                </input>
            </div>

            <div class="form-group">
                <label>Tunjangan Kesehatan</label>
                <input type="text" name="tj_kesehatan" class="form-control">
                    <?= form_error('tj_kesehatan','<div class="text-small text-danger"></div>') ?>
                </input>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

</div>
