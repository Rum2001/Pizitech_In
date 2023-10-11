<div class="dashboard-main-wrapper">
    <?php include_once('mvc/views/admin/partial/navbar-top.php'); ?>

    <?php include_once('mvc/views/admin/partial/sidebar_left.php'); ?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">

                <!-- Content -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3"><?= flash('incorrect_path') ?></div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                        <form action="">
                            <div class="form-row align-items-center">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="sr-only" for="inlineFormInput">Name</label>
                                    <input type="text" class="form-control btn text-left mb-2" placeholder="Search..">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h3 class="card-header text-primary text-center pt-4 pb-3">Top Photography</h3>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">STT</th>
                                                <th class="border-0">Tên thí sinh</th>
                                                <th class="border-0">Số phiếu bình chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (array_key_exists('topPhotoSubmission', $data)) {
                                                $topPhotoSubmission = $data['topPhotoSubmission'];
                                                $i = 0;
                                                foreach ($topPhotoSubmission as $item) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td>
                                                            <p><?= $item->name ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $item->vote ?></p>
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
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<!-- Modal confirm delete -->
<!-- Button trigger modal -->

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