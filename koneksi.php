<?php

if(!$_GET['module'] || ! in_array($_GET['module'], ['delete', 'create', 'update', 'view', 'search', 'edit']))
{
    echo "<script>window.location.href='index.php'</script>";
}

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "066_chandra";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function selectAllData($username = '')
{
    $select = $username ? "SELECT * FROM register WHERE username like '%{$username}%';" : "SELECT * FROM register;";

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

function deleteById($dataId)
{
    global $conn;
    $deleteScript = "DELETE from register where id={$dataId};";
    
    return $conn->query($deleteScript) 
        ? "<script>alert('Data Berhasil Dihapus'); window.location.href='index.php?module=view'</script>" 
        : "Error: {$deleteScript} <br> $conn->error";
}

// Delete when koneksi accesed
if($_GET['module'] == 'delete') {
    echo deleteById($_GET['id']);
}

// Add new data 
if($_GET['module'] == 'create') {
    $mysql = "INSERT INTO register (namadep, namabel, username, password, usia, jk, ttl, email, notel) VALUES ('" 
    . $_POST['namadep'] ."','"
    . $_POST['namabel'] ."','"
    . $_POST['username'] ."','"
    . $_POST['password'] ."','"
    . $_POST['usia'] ."','"
    . $_POST['jk'] ."','"
    . $_POST['ttl']."','"
    . $_POST['email']."','"
    . $_POST['notel']. "');";

    if ($conn->query($mysql) === TRUE) {
        echo "<script>alert('Data Berhasil Ditambahkan'); window.location.href='index.php'</script>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// update data
if($_GET['module'] == 'update') {
    $mysql = "UPDATE register SET 
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

    echo $conn->query($mysql) === TRUE 
      ? "<script>alert('Data Berhasil Diubah'); window.location.href='index.php?module=view'</script>" 
      : "Error: {$sql} <br> {$conn->error}";
}
