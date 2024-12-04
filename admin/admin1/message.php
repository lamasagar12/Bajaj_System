<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
 <div class="card mt-4 shadow">
    <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
        <h4 class="mb-0">Messages</h4>
    </div>
    <div class="card-body">  
        <?php alertMessage(); ?>
        <div class="table-responsive" style="overflow-x: auto;"> <!-- Added overflow-x: auto; to enable horizontal scrolling -->
            <table class="table table-striped table-bordered" > <!-- Added min-width to ensure table fills the available space -->
                <thead><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>

                    <th>Email</th>
                    <th>Message</th>
                </tr></thead>
                <tbody><?php 
                $message = getAll('messages');
                if(mysqli_num_rows($message)> 0){
               ?><?php foreach($message as $messageItem):?>
                    <tr>
                        <td><?=$messageItem['id']?></td>
                        <td><?=$messageItem['name']?></td>
                        <td><?=$messageItem['phone']?></td>

                        <td><?=$messageItem['email']?></td>
                        <td><?=$messageItem['message']?></td>

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
