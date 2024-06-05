<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Home Page</h4>
                <a href="aboutus-create.php" class="btn btn-primary">Add Images</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php 
                            $aboutus = getAll('aboutus');
                            $headings = ['ID', 'Image', 'About Bajaj', 'Image1', 'Our History', 'Image2', 'Latest Technology', 'Image3', "Contribution to Nepal's Bike Community", 'Image4', 'Our Commitment', 'Visit us Today', 'Image5', 'Status', 'Action'];
                            foreach($headings as $heading):
                                $tableContent = "";
                                if($heading == 'ID'):
                                    if(mysqli_num_rows($aboutus) == 0):
                                        $tableContent .= "<td colspan='16'>No Record found</td>";
                                    endif;
                                else:
                                    if(mysqli_num_rows($aboutus) > 0):
                                        foreach($aboutus as $item):
                                            if ($heading == 'Image'):
                                                $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image']).'" alt="'.htmlspecialchars($item['image']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == 'About Bajaj'):
                                                $tableContent .= '<td>'.htmlspecialchars($item['about']).'</td>';
                                               elseif ($heading == 'Image1'):
                                                    $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image1']).'" alt="'.htmlspecialchars($item['image1']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == 'Our History'):
                                                $tableContent .= '<td>'.htmlspecialchars($item['history']).'</td>';

                                                elseif ($heading == 'Image2'):
                                                    $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image2']).'" alt="'.htmlspecialchars($item['image2']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == 'Latest Technology'):
                                                $tableContent .= '<td>'.htmlspecialchars($item['technology']).'</td>';
                                                elseif ($heading == 'Image3'):
                                                    $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image3']).'" alt="'.htmlspecialchars($item['image3']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == "Contribution to Nepal's Bike Community"):
                                                $tableContent .= '<td>'.htmlspecialchars($item['community']).'</td>';
                                                elseif ($heading == 'Image4'):
                                                    $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image4']).'" alt="'.htmlspecialchars($item['image4']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == 'Our Commitment'):
                                                $tableContent .= '<td>'.htmlspecialchars($item['commitment']).'</td>';
                                                elseif ($heading == 'Image5'):
                                                    $tableContent .= '<td><img src="uploads/'.htmlspecialchars($item['image5']).'" alt="'.htmlspecialchars($item['image5']).'" style="max-width:auto; max-height: 200px;"></td>';
                                            elseif ($heading == 'Visit us Today'):
                                                $tableContent .= '<td>'.htmlspecialchars($item['visitus']).'</td>';
                                            elseif ($heading == 'Status'):
                                                $statusBadge = ($item['status'] == 1) ? '<span class="badge bg-danger">Disable</span>' : '<span class="badge bg-info">Active</span>';
                                                $tableContent .= '<td>'.$statusBadge.'</td>';
                                            elseif ($heading == 'Action'):
                                                $editLink = '<a href="aboutus-edit.php?id='.htmlspecialchars($item['id']).'" class="btn btn-success btn-sm">Edit</a>';
                                                $deleteLink = '<a href="aboutus-del.php?id='.htmlspecialchars($item['id']).'" class="btn btn-danger btn-sm">Delete</a>';
                                                $tableContent .= '<td>'.$editLink.$deleteLink.'</td>';
                                            else:
                                                $tableContent .= '<td>'.htmlspecialchars($item[$heading]).'</td>';
                                            endif;
                                        endforeach;
                                    else:
                                        $tableContent .= '<td colspan="15">No Record found</td>';
                                    endif;
                                endif;
                                echo "<tr><th>$heading</th>$tableContent</tr>";
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
