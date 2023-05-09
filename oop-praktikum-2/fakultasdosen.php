<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Dosen</title>
</head>
<body>
<?php

require_once "app/Mhsw.php";
$fakultas = new fakultas();
$rows = $fakultas->tampildosen();

if(isset($_GET["cari"])){
    $rows = $fakultas->cari($_GET["fakultas"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nim'])) $vfakultas =$_GET['nim'];
else $vfakultas ='';

if($vsimpan=='simpan' && ($fakultas <>'')){
    $fakultas->simpandosen();
    $rows = $fakultas->tampildosen();
    $vid ='';
    $vfakultas ='';
}

if($vaksi=="hapus")  {
    $fakultas->hapus();
    $rows = $fakultas->tampildosen();
}
if($vaksi=="cari")  {
    $rows = $fakultas->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $fakultas->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['fakultas_id'];
        $vfakultas = $row['fakultas_nim'];
    }
 }

if ($vupdate=="update"){
    $fakultas->update($vid,$vnim,$vnama,$valamat);
    $rows = $fakultas->tampil();
    $vid ='';
    $vfakultas ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vfakultas ='';
}


?>

<form action="?" method="get">
<table cellspacing="20">
    <tr><td>fakultas</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" />
        <input type="text" name="fakultas" value="<?php echo $vfakultas; ?>" /></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>

    <table border="1" cellpadding="10" cellspacing="0" style="text-align:center">
    <tr>
        <th>NO</th>
        <th>FAKULTAS</th>
        <th>AKSI</th>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fakultas']; ?></td>
            <td><a href="?id=<?php echo $row['id']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id=<?php echo $row['id']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>