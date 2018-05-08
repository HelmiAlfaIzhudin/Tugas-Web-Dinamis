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
  <div class="vendor row">
      <div style="height:100px;width:250px;background:blue;float:left">
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
            <div style="width:48%;color:white;height:120px;background:blue;position:relative;margin:20px 1%;margin-left:0%;margin-right:2%;float:left;box-sizing:border-box;">
              <div class="centerY">
                <h1 style="text-align:center;">1</h1>
                <h4 style="text-align:center;padding-top:10px;">Visitors</h4>
              </div>
            </div>
            <div style="width:48%;position:relative;color:white;height:120px;background:blue;margin:20px 1%;float:left;box-sizing:border-box;">
              <div class="centerY">
                <h1 style="text-align:center;">21</h1>
                <h4 style="text-align:center;padding-top:10px;">Projek</h4>
              </div>
            </div>
            <div style="clear:both">

            </div>
          </div>
          <div class="box">
            <h2 style="padding:10px;display:block;border-bottom:1px solid rgba(0, 0, 0, 0.03)">Media</h2>

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
                 <!-- <div class="box" style="  min-height: 300px;">
                 <table>
                     <thead>
                         <tr>
                           <th>No</th>
                           <th>Judul</th>
                           <th></th>
                         </tr>
                       </thead>
                       <tbody>
                         <!-- <?php $i=1; foreach ($members as $member): ?>

                         <tr target="<?php echo $member['no'] ?>">

                           <td><?php echo $i;$i++ ?></td>
                           <td><a href="artikel.php?id=<?php echo $member['no'] ?>" style="color:rgb(80, 136, 255);text-decoration:none"><?php echo $member['judul']; ?></a></td>
                           <td><button class="delete" target="<?php echo $member['no'] ?>"><i class="fa fa-trash"></i></button><button class="edit" target="<?php echo $member['no'] ?>" no="<?php echo $member['no'] ?>" isi="<?php echo $member['isi'] ?>" judul="<?php echo $member['judul'] ?>"><i class="fa fa-pencil"></i></button></td>

                         </tr>
                       <?php endforeach; ?>
                     </tbody>
                 </table>
             <?php endif; ?> -->


             </video>
            <div style="position:relative;height:300px;">
              <div class="centerY" align="center">
              </div>
            </div>
          </div>
          <p style="font-size:8pt;opacity:0.3;margin:10px 0;">&copy; Helmi Alfa Izzuddin - <?php echo Date('Y') ?> All Rights Reserved</p>
        </div>
      </div>
  </div>



<?php require 'footer.php'; ?>
