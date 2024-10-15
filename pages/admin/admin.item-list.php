<?php include('admin.header.php'); 

$item_id = $_GET['item'];
$item_qry = mysqli_query($conn, "SELECT c.id AS c_id, c.name AS c_name, c.designation, l.id AS l_id, l.name AS l_name, l.status, l.category FROM tbl_itemlist l LEFT JOIN tbl_itemcategory c ON l.category = c.id WHERE c.id = $item_id");

$item_qry2 = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE id = $item_id");
$item_res = mysqli_fetch_assoc($item_qry2);
?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $item_res['name']; ?>&nbsp;items&nbsp;<a href="add-itemlist?categ=<?php echo $item_id; ?>" data-toggle="modal" data-target="#additemModal" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp;Add new item</a></h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                
                <div class="tab-pane fade show active" id="pills-it" role="tabpanel" aria-labelledby="pills-it-tab">
                    <div class="table-responsive">
                        <table class="table w-100" id="itcattbl">
                            <thead hidden>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if (mysqli_num_rows($item_qry) > 0) {
                                    mysqli_data_seek($item_qry, 0); // Reset pointer to start
                                    while($list=mysqli_fetch_array($item_qry)){
                                ?>
                                    <tr>
                                        <td><?php echo $list["l_name"]; ?></td>
                                        <td class="text-right">
                                            <a href="#" class="text-secondary p-1"><i class="fas fa-pencil-alt"></i></a>
                                            <?php if ($list["status"]== '1') { ?>
                                                <a href="#" class="text-secondary p-1"><i class="fas fa-ban"></i></a>
                                            <?php } else { ?>
                                                <a href="#" class="text-secondary p-1"><i class="fas fa-check"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php 
                                        }
                                    } else {
                                        echo "<tr><td colspan='2'>No items found.</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    include('admin.add.item.modal.php');
    include('admin.footer.php');
?>