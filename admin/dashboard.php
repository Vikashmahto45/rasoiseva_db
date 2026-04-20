<?php
/**
 * RasoiSeva v3.0 - Executive Overview Console
 */
$page_title = "Executive Overview";
$active_page = "dashboard";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Data Aggregation
$tenant_count = $conn->query("SELECT id FROM tenants")->num_rows;
?>

<div class="stat-grid">
    <!-- Partner Count -->
    <div class="stat-card">
        <p class="stat-label">TOTAL PARTNERS</p>
        <div class="stat-value"><?php echo $tenant_count; ?></div>
        <p style="font-size: 0.8rem; color: var(--success); font-weight: 600; margin-top: 8px;">
            <i class="fas fa-arrow-up"></i> Registered Active
        </p>
    </div>

    <!-- Revenue -->
    <div class="stat-card">
        <p class="stat-label">MONTHLY REVENUE</p>
        <div class="stat-value">₹0.00</div>
        <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 8px;">
            Projected Pipeline
        </p>
    </div>

    <!-- Health -->
    <div class="stat-card">
        <p class="stat-label">SYSTEM UPTIME</p>
        <div class="stat-value" style="color: var(--success);">100%</div>
        <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 8px;">
            Operational Health
        </p>
    </div>
</div>

<div style="margin-top: 40px; display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Recent Registry -->
    <div style="background: white; border-radius: 12px; border: 1px solid var(--border); overflow: hidden;">
        <div style="padding: 20px 24px; border-bottom: 2px solid var(--bg-body); display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-size: 1.1rem;">Recent Registry</h3>
            <a href="tenants.php" style="font-size: 0.85rem; color: var(--primary); font-weight: 700; text-decoration: none;">View All Registry</a>
        </div>
        
        <div style="padding: 40px; text-align: center;">
            <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: var(--text-muted); margin-bottom: 15px;">
                <i class="fas fa-folder-open" style="font-size: 1.5rem;"></i>
            </div>
            <p style="color: var(--text-muted); font-size: 0.95rem;">No partner data available in this view.</p>
        </div>
    </div>

    <!-- Rapid Operations Card -->
    <div style="background: white; border-radius: 12px; border: 1px solid var(--border); padding: 24px;">
        <h3 style="font-size: 1rem; margin-bottom: 25px;">Rapid Operations</h3>
        
        <a href="add_tenant.php" class="btn-primary" style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 12px; text-decoration: none;">
            <i class="fas fa-plus"></i> Add New Enterprise
        </a>
        
        <a href="modules.php" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 12px; border: 1px solid var(--border); border-radius: 8px; color: var(--text-main); font-weight: 600; font-size: 0.95rem; text-decoration: none;">
            <i class="fas fa-cog"></i> Engine Configuration
        </a>

        <div style="margin-top: 30px; padding: 15px; background: #eff6ff; border-radius: 10px; border-left: 4px solid var(--primary);">
            <p style="font-size: 0.85rem; color: var(--primary); font-weight: 800; margin-bottom: 5px;">SYSTEM INSIGHT</p>
            <p style="font-size: 0.8rem; line-height: 1.4; color: var(--text-main);">Project v3.0 is optimized for multi-tenant high-availability operations.</p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
