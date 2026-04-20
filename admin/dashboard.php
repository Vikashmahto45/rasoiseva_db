<?php
/**
 * RasoiSeva - Admin Dashboard (Cleaned & Standardized)
 */
$page_title = "Admin Dashboard";
$active_page = "dashboard";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Quick Stats logic
$tenant_count = $conn->query("SELECT id FROM tenants")->num_rows;
?>

<div class="dashboard-grid">
    <div class="card">
        <div class="card-title">Total Restaurants</div>
        <div class="card-value"><?php echo $tenant_count; ?></div>
    </div>
    <div class="card">
        <div class="card-title">Active Subscriptions</div>
        <div class="card-value">0</div>
    </div>
    <div class="card">
        <div class="card-title">Monthly Revenue</div>
        <div class="card-value">₹0</div>
    </div>
</div>

<div class="grid-2">
    <!-- Table Card -->
    <div class="table-container">
        <div class="table-header jcsb aic flex">
            <h3>Recent Onboarding</h3>
            <a href="tenants.php" class="btn btn-sm btn-primary">Manage All</a>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tenant_count == 0): ?>
                    <tr><td colspan="3" style="text-align:center; padding:50px;">No restaurants registered.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Quick Actions -->
    <div class="card">
        <div class="card-title">System Actions</div>
        <a href="add_tenant.php" class="btn btn-primary btn-block mb-20" style="display:flex;">
            <i class="fa-solid fa-plus"></i> Add New Restaurant
        </a>
        <a href="modules.php" class="btn btn-primary btn-block" style="display:flex; background: var(--bg-main); border: 1px solid var(--border);">
            <i class="fa-solid fa-shield-virus"></i> Support Console
        </a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
