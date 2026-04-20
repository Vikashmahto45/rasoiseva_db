<?php
/**
 * RasoiSeva - Tenant Registration Processor (Enhanced)
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

    $conn->begin_transaction();

    try {
        // 1. Create Tenant Entry
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $subscription_end = date('Y-m-d H:i:s', strtotime('+30 days'));

        $stmt = $conn->prepare("INSERT INTO tenants (business_name, owner_email, status, created_at) VALUES (?, ?, 'Active', NOW())");
        $stmt->bind_param("ss", $business_name, $email);
        
        if (!$stmt->execute()) {
            throw new Exception("Error creating tenant: " . $conn->error);
        }

        $tenant_id = $conn->insert_id;

        // 2. Enable Modules
        if (!empty($modules)) {
            $m_stmt = $conn->prepare("INSERT INTO tenant_modules (tenant_id, module_name, is_active) VALUES (?, ?, 1)");
            foreach ($modules as $module) {
                $m_stmt->bind_param("is", $tenant_id, $module);
                $m_stmt->execute();
            }
            $m_stmt->close();
        }

        // 3. Create Default Primary Outlet
        $outlet_name = "Primary Outlet - " . $business_name;
        $o_stmt = $conn->prepare("INSERT INTO outlets (tenant_id, outlet_name, address) VALUES (?, ?, ?)");
        $o_stmt->bind_param("iss", $tenant_id, $outlet_name, $location);
        $o_stmt->execute();
        $outlet_id = $conn->insert_id;
        $o_stmt->close();

        // 4. Create First Restaurant Admin User
        $admin_user = "admin"; // Default username for restaurant owners
        $role = "Admin";
        $u_stmt = $conn->prepare("INSERT INTO users (tenant_id, outlet_id, username, password, role, status) VALUES (?, ?, ?, ?, ?, 1)");
        $u_stmt->bind_param("iisss", $tenant_id, $outlet_id, $admin_user, $password_hash, $role);
        $u_stmt->execute();
        $u_stmt->close();

        $conn->commit();
        set_flash_message("Restaurant '$business_name' successfully onboarded and Admin account created!", "success");
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
