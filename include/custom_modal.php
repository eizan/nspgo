<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="POST" action="http://formspree.io/iro@nusaputra.ac.id" class="text-left">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gunakan Poin</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nim" class="control-label">Nim:</label>
            <p><?php echo $mhs_nim; ?></p>
            <input type="hidden" name="NIM" value="<?php echo $mhs_nim; ?>" />
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nama:</label>
            <p><?php echo $row["mhs_nama"]; ?></p>
            <input type="hidden" name="Nama" value="<?php echo $row["mhs_nama"]; ?>" />
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Poin:</label>
            <p><?php echo $jumlah_poin; ?></p>
            <input type="hidden" name="Jumlah Poin" value="<?php echo $jumlah_poin; ?>" />
          </div> 
          <div class="form-group">
            <label for="negara" class="control-label">Negara Tujuan:</label>
            <select class="form-control" id="negara" name="Negara Tujuan">
              <?php 
              $query_negara_claim = "SELECT * FROM tbl_negara WHERE negara_poin <= 5";
              $hasil_negara_claim = mysqli_query($conn,$query_negara_claim);
              $jumlah_negara_claim = mysqli_num_rows($hasil_negara_claim);
              while ($row = mysqli_fetch_assoc($hasil_negara_claim))
              {
                echo "<option value='".$row['negara_nama']."'>".$row['negara_nama']." ".$row['negara_poin']."</option>";
              }
              ?>

            </select>
          </div>
          <div class="form-group"> <!-- Date input -->
            <label class="control-label" for="date">Tanggal Berangkat</label>
            <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required>
          </div>
          <div class="form-group">
            <label for="no_hp" class="control-label">No Hp:</label>
            <input type="text" class="form-control" name="No HP" id="no_hp" required >
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email:</label>
            <input type="text" class="form-control" name="email" id="email" required >
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Pesan:</label>
            <textarea class="form-control" id="message-text" name="pesan"></textarea>
            <input type="hidden" name="_format" value="plain" />
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Gunakan Poin</button>
        </div>
      </form>
    </div>
  </div>
</div>