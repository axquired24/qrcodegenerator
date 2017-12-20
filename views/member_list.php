<?php
$members = Member::orderBy('id', 'desc')->get();

if (count($members) != 0) {
    ?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th align="center">QR Code</th>
                    <th align="center">Act</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($members as $k => $member) {
                    $fileqr = hl_generateQR($member->qrtoken, 200);
                    ?>
                    <tr>
                        <td width="40px"><?php echo $k+1; ?></td>
                        <td>
                            <?php echo $member->name; ?>
                            <small>
                                <br> Email: <a href="mailto:<?php echo $member->email; ?>"><?php echo $member->email; ?></a>
                                <br> Terdaftar: <?php echo hl_dateFormat($member->created_at); ?>
                                <br> Token: <?php echo $member->qrtoken ?>
                            </small>
                        </td>
                        <td align="center">
                            <img src="<?php echo $fileqr ?>" alt="QR Code" class="img-responsive" style="max-height: 100px; width: auto;">
                        </td>
                        <td align="center">
                            <br class="hidden-xs">
                            <a title="Hapus Member <?php echo $member->name; ?>?" href="<?php echo hl_url('?content=member_delete&token='.$member->qrtoken); ?>" class="btn btn-danger" onclick="return confirm('Hapus Member <?php echo $member->name; ?>?')">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                } // endforeach
                ?>
                </tbody>
            </table>

            <!--    <div align="center">-->
            <!--        --><?php //// echo hl_paginateLinks($members); ?>
            <!--        <nav>-->
            <!--            <ui class="pagination">-->
            <!--                <li><a href="#"><<</a></li>-->
            <!--            </ui>-->
            <!--        </nav>-->
            <!--    </div>-->

            <!--    <pre>-->
            <!--        --><?php
            //        print_r($members);
            //        ?>
            <!--    </pre>-->
        </div>
    </div>

    <?php
} // end if count(members)
else {
    ?>
    <h1 align="center">
        <br>
        <i class="glyphicon glyphicon-thumbs-down"></i><br><br>
        Member kosong. Ayo cari member mas! :(
    </h1>
    <?php
} // end else count(members)
?>