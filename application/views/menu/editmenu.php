<?php foreach ($edit as $m) : ?>
    <form method="POST" action=<?= base_url('menu/editmenuaksi') ?>>
        <div class="form-group col-sm-6" hidden="">
            <label for="formGroupExampleInput2">id</label>
            <input type="text" class="form-control" name="id" id="id" value="<?= $m->id ?>">

        </div>
        <div class="form-group col-sm-6">
            <label for="formGroupExampleInput2">Menu</label>
            <input type="text" class="form-control" name="menu" id="menu" value="<?= $m->menu ?>">

        </div>
        <button type="Submit" class="btn btn-primary ml-4">Simpan</button>
    </form>
<?php endforeach; ?>