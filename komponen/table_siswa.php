<div>
    <h1>List Data Mahasiswa</h1>

    <?php if($_GET['module'] == 'search') : ?>
        <form method="get" style="margin: 10px 0px;">
            <input type="hidden" name="module" value="search">
            <label for="username">Username:</label>
            <div class="input-container">
                <input type="text" name="username" id="username">
                <button>Cari</button>
            </div>
        </form>
    <?php endif; ?>

    <table border="1" style="font-size: 18px;">
        <tr style="background-color: #3399FF;">
            <td>ID</td>
            <td>Nama Depan</td>
            <td>Nama Belakang</td>
            <td>Username</td>
            <td>Usia</td>
            <td>JK</td>
            <td>TTL</td>
            <td>email</td>
            <td>No Telepon</td>
            <td>Aksi</td>
        </tr>

        <?php foreach($rows as $row) : ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?= $row["namadep"] ?></td>
                <td><?= $row["namabel"] ?></td>
                <td><?= $row["username"] ?></td>
                <td><?= $row["usia"] ?></td>
                <td><?= $row["jk"] ?></td>
                <td><?= $row["ttl"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["notel"] ?></td>
                <td>
                    <a href="koneksi.php?module=delete&id=<?php echo $row['id'] ?>">Hapus</a> |
                    <a href="index.php?module=edit&id=<?php echo $row['id'] ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>