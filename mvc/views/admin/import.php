<div class="dashboard-main-wrapper">
    <?php include_once('mvc/views/admin/partial/navbar-top.php'); ?>

    <?php include_once('mvc/views/admin/partial/sidebar_left.php'); ?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">

                <!-- Content -->
                <h2 class="text-primary text-center pt-5">IMPORT PHOTOGRAPHY</h2>
                <div class="admin-import-ticket rounded px-2 py-2 bg-light" style="max-width: 750px; margin: 0 auto;">
                    <form id="form-import" action="<?= '/' . ROUTE_PHOTOGRAPHY_STORE; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row align-items-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Avatar</label>
                                <input type="file" name="avatar[]" class="form-control btn text-left mb-2" require>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Hình chi tiết (5 - 15 ảnh)</label>
                                <input type="file" multiple="multiple" name="detail_image[]" class="form-control btn text-left mb-2" require>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Tên bộ ảnh</label>
                                <input type="text" name="image_name" class="form-control btn text-left mb-2" require>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Tên thí sinh</label>
                                <input type="text" name="photography_name" class="form-control btn text-left mb-2" require>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Credit team</label>
                                <div contenteditable="true" class="form-control creadit-team-content" style="min-height: 100px;"></div>
                                <!-- <textarea class="form-control d-none" name="credit_team" cols="30" rows="3"></textarea> -->
                                <input type="hidden" name="credit_team">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <label for="" class="form-label">Mô tả ngắn</label>
                                <div contenteditable="true" class="form-control description-content" style="min-height: 100px;"></div>
                                <!-- <textarea class="form-control d-none" name="description" cols="30" rows="3"></textarea> -->
                                <input type="hidden" name="description">
                            </div>

                            <div class="col-12 text-center pt-3">
                                <button type="submit" id="btn-import" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php flash('import_error') ?>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>