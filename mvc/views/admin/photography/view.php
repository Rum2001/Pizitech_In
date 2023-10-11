<div class="dashboard-main-wrapper">
    <?php include_once('mvc/views/admin/partial/navbar-top.php'); ?>

    <?php include_once('mvc/views/admin/partial/sidebar_left.php'); ?>

    <div class="dashboard-wrapper">

        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <!-- Content -->
                <h2 class="text-primary text-center pt-4 pb-3">EDIT</h2>
                <div class="rounded px-2 py-2 bg-light">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr class="border-0">
                                        <th class="border-0">STT</th>
                                        <th class="border-0">Tên bộ ảnh</th>
                                        <th class="border-0">Tên thí sinh</th>
                                        <th class="border-0">Avatar</th>
                                        <th class="border-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($data) {
                                        $i = 0;
                                        if (array_key_exists('photography', $data)) {
                                            $photographyAll = $data['photography'];
                                            foreach ($photographyAll as $photography) {
                                                $i++; ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $photography->image_name ?></td>
                                                    <td>
                                                        <p class=""><?= $photography->name  ?></p>
                                                    </td>
                                                    <td>
                                                        <div class="photo-avatar"><img style="width: 100px; height: auto; object-fit:contain" src="<?= DIRECTORY_SEPARATOR . MEDIA_PATH_AVATAR . $photography->avatar ?>" alt=""></div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= '/' . ROUTE_ADMIN_PHOTOGRAPHY_EDIT . '/' . $photography->id ?>" class="edit btn btn-primary btn-xs mr-1" data-title="edit"><i class="fas fa-pen"></i></a>
                                                            <button data-delete="<?= '/' . ROUTE_ADMIN_PHOTOGRAPHY_DELETE . '/' . $photography->id ?>" class="btnConfirmDelete delete btn btn-danger btn-xs" data-toggle="modal" data-target="#modalConfirmDelete"><i class="fas fa-trash-alt"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                    <?php }
                                        }
                                    } ?>

                                    <!-- <tr>
                                                <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View Details</a></td>
                                            </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php include_once('mvc/views/pagination.php') ?>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- Modal -->
<div class="modal" id="modalConfirmDelete">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Do you want to delete this?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="" class="deletedTicketLink btn btn-danger">Delete</a>
            </div>

        </div>
    </div>
</div>