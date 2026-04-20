<?php
/**
 * RasoiSeva - Emergency System Cleaner
 */
$mysql_data = "C:\\xampp\\mysql\\data\\";
$files_to_remove = [
    $mysql_data . "ib_logfile0",
    $mysql_data . "ib_logfile1",
    $mysql_data . "aria_log_control",
    $mysql_data . "multi-master.info"
];

echo "Emergency Cleanup Started...\n";

foreach ($files_to_remove as $file) {
    if (file_exists($file)) {
        if (unlink($file)) {
            echo "[SUCCESS] Removed: $file\n";
        } else {
            echo "[FAILED] Could not remove: $file (Resource may be locked)\n";
        }
    } else {
        echo "[INFO] File not found (already clean): $file\n";
    }
}

echo "Cleanup Complete.\n";
?>
