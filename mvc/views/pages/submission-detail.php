<div class="submission-detail">
    <section class="submission-detail-wrap pss-relative">
        <div class="submission-detail__bg">
            <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>submission-background.png" alt="">
        </div>
        <header class="hd">
            <div class="pt-container">
                <div class="hd__row">
                    <div class="hd__logo">
                        <a href="/">
                            <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>LOGO.png" alt="">
                        </a>
                    </div>

                    <div class="hd__nav">
                        <ul class="hd__menu">
                            <li><a href="/">About us</a></li>
                            <li><a href="/page/submission">Submission</a></li>
                            <li><a href="/page/login">Sign in</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- < ?php if (!isset($_SESSION['usersId'])) { ?>
            <div class="pt-container homepage-login-ctn">
                <form action="/user/login" method="POST" class="homepage-login">
                    <span class="btn-login-close"><i class="fal fa-times"></i></span>
                    <h3 class="sign-in-title">SIGN IN</h3>
                    <div class="form-group row">
                        <label for="staticAccount" class="col-sm-3 col-form-label">Account</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control-plaintext" id="staticAccount" placeholder="Your Email">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group homepage-login__desc"><button type="submit" class="btn">Login</button></div>
                    <div class="form-group homepage-login__desc">
                        <p>Nếu bạn vẫn chưa có account</p>
                        <p>Vui lòng <a href="/page/login#pills-register">Đăng kí</a></p>
                        <p>Hoặc</p>
                        <p>Đăng nhập bằng <a href="#">Email</a></p>
                    </div>
                </form>
            </div>
        < ?php } ?> -->

        <div class="pt-container">
            <?php
            if (array_key_exists('photography', $data)) {
                $photography = $data['photography'];
                $images = explode(',,', $photography->detail_image);
                // var_dump($images);
                // die;
            ?>
                <div class="submission-detail__inner">
                    <h1 class="submission-detail__title color-white"><?php echo $photography->image_name ?></h1>
                    <div class="submission-detail__slider-ctn">
                        <div class="submission-detail__slider submission-detail__slider-single">
                            <?php foreach ($images as $image) { ?>
                                <div class="submission-detail__slider-single-item">
                                    <div class="submission-detail__slider-single-img">
                                        <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH . $image ?>" alt="">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="submission-detail__slider submission-detail__slider-nav">
                            <?php foreach ($images as $image) { ?>
                                <div class="submission-detail__slider-nav-item">
                                    <div class="submission-detail__slider-nav-img">
                                        <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH . $image ?>" alt="">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="submission-detail__credit">
                    <div class="row">
                        <div class="col-md-7 col-xs-12">
                            <div class="submission-detail__credit-ct">
                                <div class="submission-detail__credit-title">Credit Team</div>
                                <div class="submission-detail__credit-title"><?php echo htmlspecialchars_decode($photography->credit_team) ?></div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="submission-detail__credit-image">
                                <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH  ?>CREDIT_LABEL.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="submission-detail__main color-white">
                    <div class="submission-detail__vote"><?php echo $photography->vote ?> Votes</div>
                    <div class="row submission-detail__main-row">
                        <div class="col-md-7 col-xs-12">
                            <div class="submission-detail__main-ct">
                                <div class="submission-detail__main-desc">
                                    <strong>Ý nghĩa: </strong><?php  echo htmlspecialchars_decode( $photography->description) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="submission-detail__submit-vote">
                                <form action="/user/vote/<?php echo $photography->id ?>" method="POST">
                                    <button class="submission-detail__submit-vote-btn">Vote</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="final">
        <div class="pt-container">
            <div class="final__content">
                <div class="final__content-left">
                    <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>Logo-footer.png" alt="">
                </div>
                <div class="final__content-right">
                    <div class="final__title">MESMERIZING THE BEAUTY OF ORIGINS!</div>
                    <div class="final__desc">Để cập nhật thêm thông tin chi tiết về thể lệ và các các điều khoản của
                        cuộc thi, truy cập tại <a href="https://bit.ly/TnC_OPhotographyContest">https://bit.ly/TnC_OPhotographyContest</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>