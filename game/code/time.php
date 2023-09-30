<?php
function formatTime(?int $time = null) : ?string {
    if ($time == null)
        return null;
    if ($time < 60)
        return $time . 's';
    if ($time == 60)
        return '1min';
    return '1min ' . formatTime($time - 60);
}