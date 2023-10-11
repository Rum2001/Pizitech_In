
<div class="splash-container bg-white photography-form">
    <div class="card-header text-center">
        <a href="/" class="mb-3 d-block"><img class="logo-img" src="<?= DIRECTORY_SEPARATOR . MEDIA_PATH ?>/LOGO.png" alt="logo"></a>
        <span class="splash-description">Please check your email and verify your account</span>
    </div>
    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-verify" role="tabpanel" aria-labelledby="tab-verify">
            <form action="/user/verifyController" method="POST">
                <!-- Email input (hidden) -->
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <!-- Verification code input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="code">Verification code</label>
                    <div class="input-group">
                        <input type="text" name="code" id="code" class="form-control" />
                        <button type="submit" class="btn btn-primary ml-2" name="reset_otp">Reset OTP</button>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4" name="verify_button">Verify</button>
            </form>
        </div>
    </div>
    <?php flash('verify') ?>
    <?php flash('customer_store'); ?>
    <script>
        document.getElementById('resetBtn').addEventListener('click', function() {
            // Disable the button
            this.disabled = true;

            // Set the initial countdown value
            let countdown = 60;

            // Function to update the button text with countdown
            function updateButtonText() {
                document.getElementById('resetBtn').textContent = `Reset OTP (${countdown} s)`;
                countdown--;

                if (countdown < 0) {
                    // Enable the button and reset the text
                    document.getElementById('resetBtn').disabled = false;
                    document.getElementById('resetBtn').textContent = 'Reset OTP';
                } else {
                    // Call the function recursively after 1 second
                    setTimeout(updateButtonText, 1000);
                }
            }

            // Start the countdown
            updateButtonText();
        });
    </script>
    <!-- Pills content -->
</div>