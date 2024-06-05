<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <div class="card mt-4 shadow">
    <div class="card-header d-flex justify-content-between align-items-center" style="max-width: 100%; min-width: 1200px;">
        <h4 class="mb-0">Categories</h4>
        <a href="categories-create.php" class="btn btn-primary">Add Categories</a> <!-- Button added back here -->
    </div>
    <div class="card-body">  
        <?php alertMessage(); ?>
        <div class="table-responsive" style="overflow-x: auto;"> <!-- Added overflow-x: auto; to enable horizontal scrolling -->
            <table class="table table-striped table-bordered" >
                <thead><tr>
                    <th>ID</th>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Info</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr></thead>
                <tbody>
                    <?php 
                $categories = getAll('categories');
                if(mysqli_num_rows($categories)> 0){

               ?><?php foreach($categories as $item):?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <!-- Display the image using HTML <img> tag -->
                        <td><img src="uploads/<?=$item['image']?>" alt="<?=$item['name']?>" style="max-width: 45px; max-height:45px"></td>
                        <td><?=$item['name']?></td>
                        <td style="max-width: 700px; max-height:100%"><?=$item['description'] ?></td>
                        <td>
                            <?php 
                            if($item['status']==1){
                                echo '<span class="badge bg-danger">Hidden</span>';
                            }else{
                                echo '<span class="badge bg-info">Visible</span>';

                            }?>
                            </td>
                            <td>
                        <a href="categories-edit.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="categories-del.php? id=<?=$item['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr><?php endforeach;?>
                    <?php
                }else{
                    ?>
                     <tr>
                        <td colspan="4"> No Record found
                        </td>
                    </tr><?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
 </div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
