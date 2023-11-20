<?php 
function inputContainerComponent($type, $name, $label, $value) 
{
    return "
        <div class='input-container'>
        <label for='{$name}'>{$label}</label>
        <input type='{$type}' name='{$name}' id='{$name}' value='{$value}'>
        </div>
    ";
}

?>

<div>
    <input type="hidden" name="id"  value="<?= $row['id'] ?>">

    <?= inputContainerComponent('text', 'namadep', 'Nama Depan:', $row['namadep']) ?>
    <?= inputContainerComponent('text', 'namabel', 'Nama Belakang:', $row['namabel']) ?>
    <?= inputContainerComponent('text', 'username', 'Username:', $row['username']) ?>
    <?= inputContainerComponent('password', 'password', 'Password:', $row['password']) ?>
    <?= inputContainerComponent('number', 'usia', 'Usia:', $row['usia']) ?>
    <?= inputContainerComponent('text', 'jk', 'Jenis Kelamin:', $row['jk']) ?>
    <?= inputContainerComponent('text', 'ttl', 'TTL:', $row['ttl']) ?>
    <?= inputContainerComponent('email', 'email', 'Email:', $row['email']) ?>
    <?= inputContainerComponent('tel', 'notel', 'No Telepon:', $row['notel']) ?>

    <div class="input-container">
        <label ></label>
        <button type="reset" style="padding: 5px; margin-right: 5px;">Reset</button>
        <button type="submit" style="padding: 5px">Submit</button>
    </div>
</div>