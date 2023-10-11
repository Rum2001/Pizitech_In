<?php
if (!isset($_SESSION)) {
    session_start();
}

function flash($name = '', $message = '', $class = 'alert alert-danger d-flex align-items-center mb-0', $wrap = 'card-footer')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
            $_SESSION[$name . '_wrap'] = $wrap;
        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : $class;
            $wrap  = !empty($_SESSION[$name . '_wrap']) ? $_SESSION[$name . '_wrap'] : $wrap;
            echo '<div class="' . $wrap . '"><div class="' . $class . '" >' . $_SESSION[$name] . '</div></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function redirect($location)
{
    header("location: " . $location);
    exit();
}
function redirectWithEmail($location, $email)
{
    $url = $location . "?email=" . urlencode($email);
    header("Location: " . $url);
    exit();
}


function popupSuccess($name, $message = '', $class = 'text-success')
{
    if (!empty($name)) {
        
        if (!empty($message) && empty($_SESSION[$name. '_mess_popup'])) {
            $_SESSION[$name . '_mess_popup'] = $message;
            $_SESSION[$name . '_class_popup'] = $class;
        } else if (empty($message) && !empty($_SESSION[$name. '_mess_popup'])) {
            $class = !empty($_SESSION[$name . '_class_popup']) ? $_SESSION[$name . '_class_popup'] : $class;
            echo '<div class="modal" id="modelSuccess" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-primary">Completed</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body '. $class .'">
                            <p>' . $_SESSION[$name . '_mess_popup'] . '</p>
                        </div>
                        <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(window).on(\'load\', function() {
                        $(\'#modelSuccess\').modal(\'show\')
                    });
                </script>
                ';
            unset($_SESSION[$name . '_mess_popup']);
            unset($_SESSION[$name . '_class_popup']);
        }
    }
}
