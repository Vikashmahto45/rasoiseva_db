<?php
$page_title = "Admin Dashboard";
$active_page = "dashboard";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Fetch quick stats
$tenant_count = $conn->query("SELECT id FROM tenants")->num_rows;
?>

<div class="stats-grid animate-fade">
    <div class="stat-card">
        <label>Total Restaurants</label>
        <div class="value"><?php echo $tenant_count; ?></div>
    </div>
    <div class="stat-card">
        <label>Active Subscriptions</label>
        <div class="value">0</div>
    </div>
    <div class="stat-card">
        <label>Monthly Revenue</label>
        <div class="value">₹0</div>
    </div>
    <div class="stat-card">
        <label>System Health</label>
        <div class="value" style="color: var(--success);">100%</div>
    </div>
</div>

<div class="main-grid animate-fade">
    <!-- Recent Onboarding Table -->
    <div class="data-card">
        <div class="card-header">
            <h3>Recent Onboarding</h3>
            <a href="tenants.php" class="btn btn-sm btn-outline">View All</a>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Restaurant</th>
                        <th>Contact</th>
                        <th>Plan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($tenant_count == 0): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px;">No restaurants added yet.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="data-card">
        <div class="card-header">
            <h3>Quick Actions</h3>
        </div>
        <div style="padding: 25px;">
            <a href="add_tenant.php" class="btn btn-primary btn-block mb-8">
                <i class="fa-solid fa-plus"></i> Add New Restaurant
            </a>
            <a href="modules.php" class="btn btn-outline btn-block">
                <i class="fa-solid fa-gear"></i> System Configuration
            </a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
