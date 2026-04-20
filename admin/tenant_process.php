<?php
/**
 * RasoiSeva v3.0 - Professional Onboarding Engine
 */
require_once '../includes/config.php';
require_once '../includes/session.php';
protect_super_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize Inputs
    $business_name = escape($conn, $_POST['business_name']);
    $location = escape($conn, $_POST['location']);
    $owner_email = escape($conn, $_POST['owner_email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $modules = (isset($_POST['modules'])) ? implode(',', $_POST['modules']) : '';

    // 2. Validate Uniqueness
    $check = $conn->query("SELECT id FROM users WHERE username = '$owner_email'");
    if ($check->num_rows > 0) {
        die("Fatal Error: Account with this email already exists in the enterprise registry.");
    }

    $conn->begin_transaction();

    try {
        // 3. Create Tenant
        $stmt = $conn->prepare("INSERT INTO tenants (business_name, location, modules) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $business_name, $location, $modules);
        $stmt->execute();
        $tenant_id = $conn->insert_id;

        // 4. Create Primary Outlet
        $outlet_name = "Main Branch ($location)";
        $stmt = $conn->prepare("INSERT INTO outlets (tenant_id, outlet_name, location) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $tenant_id, $outlet_name, $location);
        $stmt->execute();
        $outlet_id = $conn->insert_id;

        // 5. Create Master Admin User
        $role = 'admin';
        $status = 1;
        $stmt = $conn->prepare("INSERT INTO users (tenant_id, outlet_id, username, password, role, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssi", $tenant_id, $outlet_id, $owner_email, $password, $role, $status);
        $stmt->execute();

        $conn->commit();
        header("Location: tenants.php?onboarding=success");
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        die("Architectural Error: Failed to initialize environment. " . $e->getMessage());
    }

} else {
    header("Location: add_tenant.php");
    exit;
}
?>
