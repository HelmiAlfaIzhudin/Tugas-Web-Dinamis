<?php require 'header.php'; ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('.blackcover').hide();
    $('.closetab').click(function(){
      $('.blackcover').fadeOut();
    });
    $('.tambah').click(function(){
      $('input').val('');
      $('.blackcover').fadeIn();
    });
    $('.delete').click(function(){
      if (confirm("Apakah anda yakin?")) {
        $('tr[target="'+$(this).attr('target')+'"]').fadeOut();
        $.ajax({
          url: 'proses/delete.php',
          method: 'POST',
          data: {id:$(this).attr('target')},
          success:function(r){

          }
        });
      }
    });
    $('#iniForm').submit(function(e){
      e.preventDefault();
      var form = new FormData(document.getElementById('iniForm'));
      $.ajax({
        url : 'proses/tambah.php',
        contentType : false,
        method : 'POST',
        processData : false,
        data : form,
        success:function(r){
          window.location.reload();
        }
      });
    });
    $('.edit').click(function(){
      $('input').val('');
      $('input[name="judul"]').val($(this).attr('judul'));
      $('textarea[name="isi"]').val($(this).attr('isi'));
      $('input[name="id"]').val($(this).attr('target'));
      $('.blackcover').fadeIn();
    });
  });
</script>
<div class="blackcover">
    <div class="centerY">
        <div style="width:50%;background:white;height:400px;postion:relative;background:white;margin:auto;box-shadow:0 0 1px 1px rgba(0, 0, 0, 0.16);">
          <button type="button" class="closetab" name="button"><i class="fa fa-close"></i></button>
              <form class="centerY form" id="iniForm" action="index.html" method="post">
                <label for="">Judul</label>
                <input type="text" name="judul" value="" required>
                <label for="">Isi Artikel</label>
                <textarea class="isi" name="isi"></textarea>
                <input type="hidden" name="id" value="">
                <button type="submit" class="sobmit" name="button">Submit</button>
              </form>
        </div>
    </div>
</div>

  <div class="vendor row">
      <div style="height:100px;width:250px;;float:left">
        <div class="left">
          <div class="profilebox">
            <div class="centerY">
              <h2 style="text-align:center">Hallo Helmi</h2>
              <h6 style="padding-top:20px;"><span style="color:white;background:blue;padding:5px;border-radius:5px">Online</span></h6>
            </div>
          </div>
          <div class="navigasi">
              <ul>
                <li><a href="index.php">Dashboard</a><span class="icon"><i class="fa fa-dashboard"></i></span></li>
                <li><a href="member.php">Artikel</a><span class="icon"><i class="fa fa-pencil"></i></span></li>
              <!--<li><a href="javascript:alert('Maaf Menu Belum Tersedia')">Comments</a><span class="icon"><i class="fa fa-comments"></i></span></li>
                <li><a href="javascript:alert('Maaf Menu Belum Tersedia')">Notification</a><span class="icon"><i class="fa fa-bell"></i></span></li>
              <li><a href="javascript:alert('Maaf Menu Belum Tersedia')">Contact</a><span class="icon"><i class="fa fa-address-book"></i></span></li>
              --></ul>
          </div>
        </div>
      </div>
      <div style="width:calc(100% - 250px);float:left;">
        <div style="padding:5px 25px">
          <div class="row">

            </div>

            <div style="clear:both">

            </div>
          </div>
          <?php
            $members = getMember();

           ?>

           <?php if ($members=="Not Found"): ?>
             <div class="box" style="  height: 300px;">
              <div class="centerY" align="center">
                  <h1>Not Found</h1>
                  <p>Data yang anda cari tidak ditemukan</p>
              </div>
             <?php else: ?>
               <div class="box" style="  min-height: 300px;">
               <table>
                   <thead>
                       <tr>
                         <th>No</th>
                         <th>Judul</th>
                         <th></th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php $i=1; foreach ($members as $member): ?>

                       <tr target="<?php echo $member['no'] ?>">

                         <td><?php echo $i;$i++ ?></td>
                         <td><a href="artikel.php?id=<?php echo $member['no'] ?>" style="color:rgb(80, 136, 255);text-decoration:none"><?php echo $member['judul']; ?></a></td>
                         <td><button class="delete" target="<?php echo $member['no'] ?>"><i class="fa fa-trash"></i></button><button class="edit" target="<?php echo $member['no'] ?>" no="<?php echo $member['no'] ?>" isi="<?php echo $member['isi'] ?>" judul="<?php echo $member['judul'] ?>"><i class="fa fa-pencil"></i></button></td>

                       </tr>
                     <?php endforeach; ?>
                   </tbody>
               </table>
             </div>
             <div class="" style="background:white;padding:20px;border-top:1px solid rgba(0, 0, 0, 0.03);position:relative">
               <p>Page 1 Of 10</p>
               <button class="centerY tambah" type="button" name="button" style="right:10px;position:absolute;padding:7px;background:rgb(124, 179, 255);border:none;color:white"><i class="fa fa-plus"></i> Tambah Artikel</button>
             </div>
           <?php endif; ?>
          <p style="font-size:8pt;opacity:0.3;margin:10px 0;">&copy; Helmi Alfa Izzuddin - <?php echo Date('Y') ?> All Rights Reserved</p>
        </div>
      </div>
  </div>



<?php require 'footer.php'; ?>
