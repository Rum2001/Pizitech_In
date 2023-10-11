<section class="top-page pss-relative">
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
                        <li><a href="#about-us">About us</a></li>
                        <li><a href="/page/submission">Submission</a></li>
                        <li><a href="/page/login">Sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="oriental-beauty">
        <div class="oriental-beauty__image">
            <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>THUY-TIEN-ORIENTAL-BEAUTY.jpg" alt="ORIENTAL BEAUTY">
        </div>
    </div>
    <?php if (!isset($_SESSION['usersId'])) { ?>
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
    <?php } ?>
</section>
<section class="about-us" id="about-us">
    <div class="pt-container">
        <div class="font-size-full">
            <h2 class="about-us__title font-second-hairline-title">About Us</h2>
        </div>
        <div class="about-us__content">
            <div class="about-us__ct-item">
                <div class="about-us__col-1">Ô PHOTOGRAPHY<br>CONTEST</div>
                <div class="about-us__col-2"></div>
                <div class="about-us__col-3">
                    Ô PHOTOGRAPHY CONTEST 2022 là một sân chơi sáng tạo được tạp chí L’OFFICIEL Vietnam tự hào giới
                    thiệu như một chuỗi các sự kiện kỷ niệm nhằm tôn vinh thế giới thời trang đầy màu sắc cũng như mang
                    tới những đề tài gợi mở và thú vị, khuyến khích cộng đồng sáng tạo trẻ thể hiện bản thân và thực
                    hành với thời trang.
                </div>
            </div>
            <div class="about-us__ct-item about-us__ct-item--bottom">
                <div class="about-us__col-1">THEME</div>
                <div class="about-us__col-2 about-us__col-2--thin"></div>
                <div class="about-us__col-3 about-us__col-3--bold color-white">
                    Nghệ thuật sân khấu dân gian đến từ các quốc gia phương Đông
                </div>
            </div>
        </div>
    </div>
</section>
<section class="judges">
    <div class="judges__image pss-relative">
        <div class="font-size-full judges__title">
            <h2 class="font-second-hairline-title">Judges</h2>
        </div>
        <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>judges.png" alt="">

        <div class="judges__content">
            <div class="judges__content-title font-prm-ultrabold-24 color-orange">CÁC GIÁM KHẢO VÒNG SƠ KHẢO</div>
            <ul class="judges__list font-prm-ultrabold-24 color-orange">
                <li>+ Nam Thi</li>
                <li>+ Tuyết Lan</li>
                <li>+ Linh Lưu</li>
                <li>+ Trang Phạm</li>
                <li>+ Hậu Lê</li>
                <li>+ Xi Quan Lê</li>
                <li>+ Mạnh Bi</li>
                <li>+ Kelbin Lei</li>
            </ul>
        </div>
    </div>
</section>
<section class="middle">
    <div class="middle__image">
        <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>content-middle.png" alt="">
    </div>
</section>

<section class="countdown">
    <div class="font-size-full">
        <h2 class="countdown__title font-second-hairline-title">Countdown</h2>
    </div>

    <div class="countdown__content pt-container">
        <div class="countdown__content-inner">
            <div class="countdown__end-time-ct" style="display: none;">Thời gian bình chọn đã kết thúc.</div>
            <div class="countdown__group">
                <span class="countdown__time">
                    <span class="countdown__time-day" id="days">3</span>
                    <span class="countdown__time-label">Ngày</span>
                </span>
                <span class="countdown__time">
                    <span class="countdown__time-hour" id="hours">10</span>
                    <span class="countdown__time-label">Giờ</span>
                </span>
                <span class="countdown__time">
                    <span class="countdown__time-minute" id="minutes">08</span>
                    <span class="countdown__time-label">Phút</span>
                </span>
                <span class="countdown__time countdown__time--second">
                    <span class="countdown__time-second" id="seconds">45</span>
                    <span class="countdown__time-label">Giây</span>
                </span>
            </div>
        </div>
    </div>
</section>

<section class="submission">
    <div class="font-size-full">
        <h2 class="submission__title font-second-hairline-title">Submission</h2>
    </div>
    <div class="submission__container pt-container">
        <div class="submission__main">
            <?php
            if (array_key_exists('photography', $data)) {
                $photographyAll = $data['photography'];
            ?>
                <div class="submission__list submission__list-home">
                    <?php
                    $i = 0;
                    foreach ($photographyAll as $photography) {
                        $i++;
                        if ($i > 6) break;
                    ?>
                        <div class="submission__item">
                            <a href="page/submissionDetail/<?php echo $photography->id ?>" class="submission__item-thumb-link">
                                <div class="submission__item-thumb">
                                    <img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH_AVATAR . $photography->avatar ?>" alt="">
                                </div>
                            </a>
                            <div class="submission__item-desc">
                                <a href="page/submissionDetail/<?php echo $photography->id ?>">
                                    <div class="submission__item-name"><?php echo $photography->image_name ?></div>
                                    <div class="submission__item-applicant"><?php echo $photography->name ?></div>
                                    <div class="submission__item-vote-num"><?php echo $photography->vote ?> Votes</div>
                                </a>
                                <a href="page/submissionDetail/<?php echo $photography->id ?>" class="submission__item-link"><span>More</span><img src="<?php echo DIRECTORY_SEPARATOR . MEDIA_PATH ?>arrow-right-orange.png" alt=""></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="submission__view-all">
                    <a class="submission__view-all-btn" href="page/submission">VIEW ALL</a>
                </div>
            <?php } ?>
        </div>
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