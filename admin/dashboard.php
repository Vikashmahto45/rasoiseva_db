<?php
$page_title = "Admin Dashboard";
$active_page = "dashboard";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Fetch quick stats
$tenant_count = $conn->query("SELECT id FROM tenants")->num_rows;
?>

<div class="stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 40px;">
    <div class="glass-card" style="padding: 25px;">
        <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 5px;">Total Restaurants</p>
        <h2 style="font-size: 2rem;"><?php echo $tenant_count; ?></h2>
    </div>
    <div class="glass-card" style="padding: 25px;">
        <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 5px;">Active Subscriptions</p>
        <h2 style="font-size: 2rem;">0</h2>
    </div>
    <div class="glass-card" style="padding: 25px;">
        <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 5px;">Monthly Revenue</p>
        <h2 style="font-size: 2rem;">₹0</h2>
    </div>
    <div class="glass-card" style="padding: 25px;">
        <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 5px;">Pending Support</p>
        <h2 style="font-size: 2rem;">0</h2>
    </div>
</div>

<div class="main-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <div class="recent-tenants glass-card" style="padding: 25px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h3>Recent Onboarding</h3>
            <a href="tenants.php" style="color: var(--primary-color); text-decoration: none; font-size: 0.85rem;">View All</a>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: left; border-bottom: 1px solid var(--border); color: var(--text-secondary); font-size: 0.8rem;">
                    <th style="padding-bottom: 15px;">Restaurant</th>
                    <th style="padding-bottom: 15px;">Contact</th>
                    <th style="padding-bottom: 15px;">Plan</th>
                    <th style="padding-bottom: 15px;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tenant_count == 0): ?>
                <tr>
                    <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-secondary);">No restaurants added yet.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="quick-actions glass-card" style="padding: 25px;">
        <h3 style="margin-bottom: 25px;">Quick Actions</h3>
        <a href="add_tenant.php" class="btn-primary" style="display: block; text-align: center; text-decoration: none; margin-bottom: 15px;">
            <i class="fa-solid fa-plus"></i> Add New Tenant
        </a>
        <button class="btn-primary" style="width:100%; background: var(--bg-dark); border: 1px solid var(--border);">
            <i class="fa-solid fa-gear"></i> System Config
        </button>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
