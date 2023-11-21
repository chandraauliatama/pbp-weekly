<?php include_once 'koneksi.php'; ?>
<div style="padding: 10px">
    <div>
        <h1 style="color: #003399;">Register</h1>
    </div>

    <form action="koneksi.php?module=update" method="post">
        <?php if ($row = selectById($_GET['id'])) {include_once 'komponen/form.php';}?>
    </form>

</div>