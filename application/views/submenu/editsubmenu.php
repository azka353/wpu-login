<?php foreach ($Submenu as $sm) : ?>
    <form method="POST" action=<?= base_url('submenu/editsubmenuaksi') ?>>
        <div class="form-group col-sm-6" hidden="">
            <label for="formGroupExampleInput2">id</label>
            <input type="text" class="form-control" name="id" id="id" value="<?= $sm->id ?>">

        </div>
        <div class="form-group col-sm-6">
            <label for="formGroupExampleInput2">Sub menu</label>
            <input type="text" class="form-control" name="title" id="title" value="<?= $sm->Submenu ?>">

        </div>
        <button type="Submit" class="btn btn-primary ml-4">Simpan</button>
    </form>
<?php endforeach; ?>