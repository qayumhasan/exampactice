<?php include 'template_part/header.php'; ?>

        <!-- Navigation -->
<?php include 'template_part/navbar.php'; ?>     

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="page-header">Manage Valintien Banner</h1>
            </div>
                <!-- /.col-lg-12 -->
        </div>


        <?php 
          if (isset($_GET['del_id'])){ 

            $del_id=$_GET['del_id'];

            $img_query = "SELECT * FROM tbl_banner WHERE id='$del_id'";
            $img_result =$db->select($img_query);
           if ($img_result) {
              while ($result = $img_result->fetch_assoc()) {
               $del_img = $result['images'];
               unlink($del_img);
            }
           }


            $query = "DELETE FROM tbl_banner WHERE id='$del_id'";
            $result = $db->delete($query);
          }
         ?>

        <div class="row">
          <div class="col-lg-12">
            
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Title</th>
                  <th scope="col">Sub Title</th>
                  <th scope="col">Body</th>
                  <th scope="col">image</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                    $query = "SELECT * FROM tbl_banner";
                    $result = $db->select($query);
                    if ($result) {
                        $i=0;
                        while ($row = $result->fetch_assoc()) {
                          $i++;
                     
                 ?>
                <tr>
                  <th scope="row"><?php echo $i; ?></th>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['stitle']; ?></td>
                  <td><?php echo $fm->textshotener($row['body'],150); ?></td>
                  <td><img src="<?php echo $row['images']; ?>" width='50px;'></td>
                  <td>
                    <?php if ($row['status']==1) {
                    echo "Publiced";
                  }else{
                    echo "Unpublics";
                  } ?>
                    
                  </td>
                  <td>
                    <a href="update_banner.php?edit_id=<?php echo $row['id']; ?>">Edit</a> ||
                    <a href="?del_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                  </td>
                </tr>

                <?php
                        }
                      }
                     ?>
              </tbody>
            </table>


          </div>
        </div>

        
    </div>
</div>




<?php include 'template_part/footer.php'; ?>