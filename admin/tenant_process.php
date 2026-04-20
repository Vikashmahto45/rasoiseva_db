<?php
/**
 * RasoiSeva - Tenant Registration Processor
 */
require_once '../includes/config.php';
require_once '../includes/session.php';
protect_super_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $business_name = escape($conn, $_POST['business_name']);
    $location = escape($conn, $_POST['location']);
    $email = escape($conn, $_POST['owner_email']);
    $password = $_POST['password'];
    $modules = $_POST['modules'] ?? [];

    if (empty($business_name) || empty($email) || empty($password)) {
        set_flash_message("Please fill all required fields.");
        header("Location: add_tenant.php");
        exit;
    }

    // 1. Create Tenant Entry
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $subscription_end = date('Y-m-d H:i:s', strtotime('+30 days')); // Default 30 day trial

    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare("INSERT INTO tenants (business_name, owner_email, password, location, subscription_status, subscription_end) VALUES (?, ?, ?, ?, 'active', ?)");
        $stmt->bind_param("sssss", $business_name, $email, $password_hash, $location, $subscription_end);
        
        if (!$stmt->execute()) {
            throw new Exception("Error creating tenant: " . $conn->error);
        }

        $tenant_id = $conn->insert_id;

        // 2. Enable Modules
        if (!empty($modules)) {
            $m_stmt = $conn->prepare("INSERT INTO tenant_modules (tenant_id, module_name, is_enabled) VALUES (?, ?, 1)");
            foreach ($modules as $module) {
                $m_stmt->bind_param("is", $tenant_id, $module);
                $m_stmt->execute();
            }
            $m_stmt->close();
        }

        $conn->commit();
        set_flash_message("Restaurant '$business_name' successfully onboarded!", "success");
        header("Location: tenants.php");
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        set_flash_message("Failed to initialize tenant: " . $e->getMessage());
        header("Location: add_tenant.php");
        exit;
    }

} else {
    header("Location: tenants.php");
    exit;
}
?>
