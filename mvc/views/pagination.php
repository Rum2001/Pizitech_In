<?php
if (isset($data['total_page']) && $data['total_page'] && $data['total_page'] >= $data['current_page'] && $data['total_page'] != 1) { ?>
    <nav aria-label="Page navigation" class="py-3 px-2 mt-3">
        <ul class="pagination">
            <?php
            // First
            echo $data['current_page'] > 2 ? '<li class="page-item"><a class="page-link" href="?per_page=' . $data['per_page'] . '&page=1">First</a></li>' : '';

            // Number
            for ($num = 1; $num <= $data['total_page']; $num++) {
                $active = $num == (int) $data['current_page'] ? ' active' : null;
                if($num > $data['current_page'] - 3 && $num < $data['current_page'] + 3) {
                    echo '<li class="page-item' . $active . '"><a class="page-link" href="?per_page=' . $data['per_page'] . '&page=' . $num . '">' . $num . '</a></li>';
                }
            }

            // Last
            echo $data['current_page'] < $data['total_page'] - 1 ? '<li class="page-item"><a class="page-link" href="?per_page=' . $data['per_page'] . '&page=' . $data['total_page'] . '">Last</a></li>' : '';
            ?>

        </ul>
    </nav>
<?php
}
?>