<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>

                <div class="card-tools">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>Add
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                if($this->session->flashdata('pesan'))
                {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                }
                ?>
            <table class="table table-bordered" id="example1">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Stok</th>
                        <th>Warna</th>
                        <th>Size</th>
                        <th>Action</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                     foreach ($kategori as $key => $value ){?>

                    <tr>
                        <td class="text-center"><?= $no++;?></td>
                        <td><?= $value->nama_kategori?></td>
                        <td><?= $value->stok?></td>
                        <td><?= $value->warna?></td>
                        <td><?= $value->size?></td>
                        
                        <td class="text-center">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$value->id_kategori ?>"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$value->id_kategori ?>"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>




          <div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Kategori</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <?php
                echo form_open('kategori/add');
            ?>
                   <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" placeholder="Stok" required>
                  </div>
                  <div class="form-group">
                    <label>Warna</label>
                    <input type="text" name="warna" class="form-control" placeholder="Warna" required>
                  </div>
                  <div class="form-group">
                    <label>Size</label>
                    <input type="text" name="size" class="form-control" placeholder="Size" required>
                  </div>
                  

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              
            </div>
            <?php
                echo form_close();
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!--modal-edit-->
    <?php foreach ($kategori as $key => $value ){?>
      <div class="modal fade" id="edit<?=$value->id_kategori ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <?php
                echo form_open('kategori/edit/' . $value->id_kategori);
            ?>

                  <div class="form-group">
                    <label>Nama  Kategori</label>
                    <input type="text" name="nama_kategori" value="<?=$value->nama_kategori ?>" class="form-control" placeholder="Nama Kategori" required>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" value="<?=$value->stok ?>"  class="form-control" placeholder="stok" required>
                  </div>
                  <div class="form-group">
                    <label>Warna</label>
                    <input type="text" name="warna" value="<?=$value->warna ?>"  class="form-control" placeholder="warna" required>
                  </div>
                  <div class="form-group">
                    <label>Size</label>
                    <input type="text" name="size" value="<?=$value->size ?>"  class="form-control" placeholder="size" required>
                  </div>
                  

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
              
            </div>
            <?php
                echo form_close();
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php }?>



      <!--modal-delete-->
<?php foreach ($kategori as $key => $value ){?>
      <div class="modal fade" id="delete<?=$value->id_kategori ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete <?= $value->nama_kategori?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?= base_url('kategori/delete/' . $value->id_kategori) ?>"class="btn btn-danger">Delete</a>
             
              
            </div>
            <?php
                echo form_close();
            ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<?php }?>

