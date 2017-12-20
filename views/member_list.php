<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Nama</th>
            <th>QR Code</th>
        </thead>
        <tbody>
        <?php
        $members = Member::orderBy('id', 'desc')->get();
        foreach ($members as $k => $member) {
            $fileqr = hl_generateQR($member->qrtoken, 200);
            ?>
            <tr>
                <td width="40px"><?php echo $k+1; ?></td>
                <td>
                    <?php echo $member->name; ?>
                    <br> Terdaftar: <?php echo hl_dateFormat($member->created_at); ?>
                </td>
                <td>
                    <img src="<?php echo $fileqr ?>" alt="QR Code" class="img-responsive" style="height: 100px; width: auto;">
                    <?php echo $member->qrtoken ?>
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
