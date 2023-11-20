<div>
    <input type="hidden" name="id"  value="<?= $row['id'] ?>">
    <div class="input-container">
        <label for="namadep">Nama Depan:</label>
        <input type="text" name="namadep" id="namadep" value="<?= $row['namadep'] ?>">
    </div>

    <div class="input-container">
        <label for="namabel">Nama Belakang:</label>
        <input type="text" name="namabel" id=namabel  value="<?= $row['namabel'] ?>">
    </div>

    <div class="input-container">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"  value="<?= $row['username'] ?>">
    </div>

    <div class="input-container">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"  value="<?= $row['password'] ?>">
    </div>

    <div class="input-container">
        <label for="usia">Usia:</label>
        <input type="text" name="usia" id="usia"  value="<?= $row['usia'] ?>">
    </div>

    <div class="input-container">
        <label for="jk">Jenis Kelamin:</label>
        <input type="text" name="jk" id="jk"  value="<?= $row['jk'] ?>">
    </div>

    <div class="input-container">
        <label for="ttl">Tempat Tgl Lahir:</label>
        <input type="text" name="ttl" id="ttl"  value="<?= $row['ttl'] ?>">
    </div>

    <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"  value="<?= $row['email'] ?>">
    </div>

    <div class="input-container">
        <label for="notel">No Telepon:</label>
        <input type="tel" name="notel" id="notel"  value="<?= $row['notel'] ?>">
    </div>

    <div class="input-container">
        <label ></label>
        <button type="reset" style="padding: 5px; margin-right: 5px;">Reset</button>
        <button type="submit" style="padding: 5px">Submit</button>
    </div>
</div>