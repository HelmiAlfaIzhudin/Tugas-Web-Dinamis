<?php
require __DIR__ . '/../function.php';

print_r($_POST);

if ($_POST['id'] == "") {
  tambah([
    'judul' => htmlentities($_POST['judul']),
    'isi'=> htmlentities($_POST['isi']),
  ]);
}else {
  ubah([
    'judul' => htmlentities($_POST['judul']),
    'isi'=> htmlentities($_POST['isi']),
    'no'=>$_POST['id']
  ]);
}
 ?>
