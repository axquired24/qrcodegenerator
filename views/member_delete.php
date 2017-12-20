<?php
// action
$token = hl_getIfIsset('token');
if ($token != null) {
    $member = Member::where('qrtoken', $token)->first();
    echo '<h2 align="center">Menghapus '.$member->name.' ...</h2>';
    $member->delete();
//    echo '<script>alert("Member '.$member->name.' terhapus")</script>';
    echo '<script>document.location="'.hl_url().'"</script>';
}
?>
