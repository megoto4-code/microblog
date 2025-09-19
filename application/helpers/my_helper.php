<?php

// Database oriented tasks



// Normal tasks

function active_menu($m_str) {
    $c_str = substr(uri_string(), strrpos(uri_string(), '/') + 1);
    if ($c_str == $m_str) {
        echo ' class="active"';
    }
}

function flash_msg($id, $head, $tail) {
    if (isset($_SESSION['msg' . $id])) {
        echo $head . $_SESSION['msg' . $id] . $tail;
        unset($_SESSION['msg' . $id]);
    }
}

function dob($start, $end) {
    years($start, $end, '');
    months('');
    days('');
}

function years($start, $end, $class) {
    echo '<select name="year" class="' . $class . '">';
    echo '<option value="" selected="selected">Year</option>';
    for ($i = $start; $i <= $end; $i++) {
        echo '<option value="' . $i . '"' . set_select('year', $i) . '>' . $i . '</option>';
    }
    echo '</select> ';
}

function months($class) {
    $mm = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    echo '<select name="month" class="' . $class . '">';
    echo '<option value="" selected="selected">Month</option>';
    for ($i = 0; $i < 12; $i++) {
        echo '<option value="' . ($i + 1) . '"' . set_select('month', ($i + 1)) . '>' . $mm[$i] . '</option>';
    }
    echo '</select> ';
}

function days($class) {
    echo '<select name="day" class="' . $class . '">';
    echo '<option value="" selected="selected">Day</option>';
    for ($i = 1; $i <= 31; $i++) {
        echo '<option value="' . $i . '"' . set_select('day', $i) . '>' . $i . '</option>';
    }
    echo '</select>';
}
