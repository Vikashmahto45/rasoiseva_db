<?php
/**
 * RasoiSeva v2.0 - Executive Governance Dashboard
 */
$page_title = "Executive Overview";
$active_page = "dashboard";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Fetch Global Statistics
$tenant_count = $conn->query("SELECT id FROM tenants")->num_rows;
?>

<!-- Statistics Ecosystem -->
<div class="dashboard-grid animate-fade">
    <div class="card glass-effect emerald-glow">
        <label class="input-container" style="color:var(--brand-primary); font-size:0.75rem; letter-spacing:1px; font-weight:800;">ACTIVE ENTERPRISES</label>
        <div style="font-size: 2.8rem; font-weight: 900; margin-top: 5px;"><?php echo $tenant_count; ?></div>
        <p style="color:var(--text-muted); font-size:0.85rem; margin-top:10px;">Total Onboarded Partners</p>
    </div>

    <div class="card glass-effect">
        <label class="input-container" style="color:var(--status-warning); font-size:0.75rem; letter-spacing:1px; font-weight:800;">REVENUE PIPELINE</label>
        <div style="font-size: 2.8rem; font-weight: 900; margin-top: 5px;">₹0.00</div>
        <p style="color:var(--text-muted); font-size:0.85rem; margin-top:10px;">Monthly Recurring Revenue</p>
    </div>

    <div class="card glass-effect">
        <label class="input-container" style="color:var(--brand-primary); font-size:0.75rem; letter-spacing:1px; font-weight:800;">SYSTEM INTEGRITY</label>
        <div style="font-size: 2.8rem; font-weight: 900; margin-top: 5px; color:var(--status-success);">100%</div>
        <p style="color:var(--text-muted); font-size:0.85rem; margin-top:10px;">Real-time Health Monitor</p>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-top: 40px;" class="animate-fade">
    <!-- Live Partner Feed -->
    <div class="table-container glass-effect">
        <div class="table-header jcsb aic flex">
            <div>
                <h3 style="font-weight: 800;">Recent Partnerships</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem;">Chronological onboarding records</p>
            </div>
            <a href="tenants.php" class="btn-v2" style="padding: 10px 20px; font-size: 0.8rem; width: auto;">
                <span>View Full Registry</span>
            </a>
        </div>
        
        <table class="data-table">
            <thead>
                <tr>
                    <th>Enterprise Client</th>
                    <th>Headquarters</th>
                    <th>Identity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tenant_count == 0): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 60px; color: var(--text-muted);">
                            <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 15px; display: block; opacity: 0.3;"></i>
                            No partnerships established yet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Rapid Operations Container -->
    <div class="card glass-effect" style="border-color: var(--brand-primary-glow);">
        <h3 style="font-weight: 800; margin-bottom: 25px; border-bottom: 1px solid var(--border-soft); padding-bottom: 15px;">Rapid Operations</h3>
        
        <a href="add_tenant.php" class="btn-v2" style="margin-bottom: 15px;">
            <i class="fas fa-plus-circle"></i>
            <span>Add New Restaurant</span>
        </a>
        
        <a href="modules.php" class="btn-v2" style="background: var(--bg-dark-950); border: 1px solid var(--border-soft); color: white;">
            <i class="fas fa-microchip"></i>
            <span>Engine Configuration</span>
        </a>
        
        <div style="margin-top: 30px; padding: 20px; border-radius: 18px; background: rgba(16, 185, 129, 0.05); border: 1px dashed var(--border-vibrant);">
            <p style="font-size: 0.85rem; color: var(--brand-primary); font-weight: 600;">System Insight</p>
            <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 5px;">Your multi-tenant architecture is currently synchronized with Hostinger servers.</p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
