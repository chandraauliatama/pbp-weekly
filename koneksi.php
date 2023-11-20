<?php

function redirectJs($module = false)
{
    return $module 
        ? "window.location.href='index.php?module={$module}'" 
        : "window.location.href='index.php'";
}

$allowedModule = ['delete', 'create', 'update', 'view', 'search', 'edit'];

if(!$_GET['module'] || ! in_array($_GET['module'], $allowedModule))
{
    $redirect = redirectJs();

    echo "<script>{$redirect}</script>";
}

// MySql Credentials 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "066_chandra";

// Create New MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}

function selectAllData($username = '')
{
    $select = $username 
        ? "SELECT * FROM register WHERE username like '%{$username}%';" 
        : "SELECT * FROM register;";

    global $conn;

    if ($result = $conn->query($select)) {
        return $result->fetch_all(MYSQLI_ASSOC);    
    }

    return [];
}

function selectById($dataId) 
{
    global $conn;

    $select = "SELECT * from register where id={$dataId};";

    if ($result = $conn->query($select)) {
        return $result->fetch_assoc();
    }
}

// Delete when koneksi accesed
if($_GET['module'] == 'delete') {
    $deleteQuery = "DELETE from register where id={$_GET['id']};";

    $redirect = redirectJs('view');

    echo $conn->query($deleteQuery) === TRUE
        ? "<script>alert('Data Berhasil Dihapus'); {$redirect} </script>" 
        : "Error: {$deleteQuery} <br> $conn->error";
}

// Add new data 
if($_GET['module'] == 'create') {
    $insertDataQuery = "INSERT INTO register (namadep, namabel, username, password, usia, jk, ttl, email, notel) VALUES (
        '{$_POST['namadep']}', 
        '{$_POST['namabel']}', 
        '{$_POST['username']}', 
        '{$_POST['password']}', 
        '{$_POST['usia']}', 
        '{$_POST['jk']}', 
        '{$_POST['ttl']}', 
        '{$_POST['email']}', 
        '{$_POST['notel']}');
    ";

    $redirect = redirectJs();

    echo $conn->query($insertDataQuery) === TRUE
        ? "<script>alert('Data Berhasil Ditambahkan'); {$redirect} </script>"
        : "Error: " . $insertDataQuery . "<br>" . $conn->error;
}

// update data
if($_GET['module'] == 'update') {
    $updateQuery = "UPDATE register SET 
        namadep='{$_POST['namadep']}', 
        namabel='{$_POST['namabel']}', 
        username='{$_POST['username']}', 
        password='{$_POST['password']}', 
        email='{$_POST['email']}', 
        ttl='{$_POST['ttl']}', 
        usia='{$_POST['usia']}', 
        jk='{$_POST['jk']}', 
        notel='{$_POST['notel']}' 
        where id={$_POST['id']}
    ";

    echo $conn->query($updateQuery) === TRUE 
      ? "<script>alert('Data Berhasil Diubah'); window.location.href='index.php?module=view'</script>" 
      : "Error: {$updateQuery} <br> {$conn->error}";
}
