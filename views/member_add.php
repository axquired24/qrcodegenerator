<?php
// action
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $member = new Member();
    $member->name = $name;
    $member->email = $email;
    if ($_POST['email'] == '') {
        $member->email = hl_slugify($name) . '@mdp.mobilan.id';
    }
    $member->qrtoken = hl_tokenGenerate($name);
    $member->save();

    header('location:'.hl_url());
}
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" enctype="multipart/form-data" action="<?php echo hl_url('?content=member_add') ?>" class="form">
            <div class="form-group">
                <label for="">Nama*</label>
                <input name="name" type="text" class="form-control" placeholder="Albert Septiawan" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="email" class="form-control" placeholder="albert-septiawan@mdp.mobilan.id">
                <small class="help-block">Opsional, jika tidak diisi akan otomatis membuat sample nama@mdp.mobilan.id</small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            </div>
        </form>
    </div>
</div>
