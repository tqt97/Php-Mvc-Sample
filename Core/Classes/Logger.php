<?php

function logger(string $message)
{
    $log_filename = "Log";
    if (!file_exists($log_filename)) {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, date("Y-m-d H:i:s") . ": " . $message . "\n", FILE_APPEND);
}