<?php 
    include_once 'koneksi.php';
    $rows = selectAllData($_GET['username']);
    $index = 1;
    include_once 'komponen/table_siswa.php'
?>