<?php
function persiapan(){
  $pdo = new PDO('mysql:host=localhost;dbname=webdesa2;', 'root', '');
  return $pdo;
}

function tambah(array $data){
  $pdo = persiapan();
  $exec = $pdo->prepare('INSERT INTO artikel (judul,isi) VALUES(:judul,:isi)');
  $exec->execute($data);
}


  function artikel(int $int)
{
  $pdo = persiapan();
  $exec = $pdo->prepare('SELECT * FROM artikel WHERE no = :no');
  $exec->execute([
    'no' => $int
  ]);

  if ($exec->rowCount() > 0) {
    $exec->setFetchMode(PDO::FETCH_ASSOC);
    return $exec->fetchAll();
  }else {
    return "Not Found";
  }

}
function getMember(){
  $pdo = persiapan();
  $exec = $pdo->prepare('SELECT * FROM artikel');
  $exec->execute();

  if ($exec->rowCount() > 0) {
    $exec->setFetchMode(PDO::FETCH_ASSOC);
    return $exec->fetchAll();
  }else {
    return "Not Found";
  }

}
function hapus(int $id){
  $pdo = persiapan();
  $exec = $pdo->prepare('DELETE FROM artikel WHERE no = :id');
  $exec->execute([
    'id'=>$id
  ]);
}
function ubah(array $data)
{
  $pdo = persiapan();
  $exec = $pdo->prepare('UPDATE artikel SET judul=:judul, isi=:isi WHERE no = :no');
  $exec->execute($data);
}

 ?>
