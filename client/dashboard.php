<?php
/**
 * RasoiSeva v3.0 - Restaurant Management Dashboard
 */
$page_title = "Operational Dashboard";
$active_page = "dashboard";
require_once 'includes/header.php';
?>

<div class="stat-grid">
    <div class="stat-card">
        <p class="stat-label">TODAY'S REVENUE</p>
        <div class="stat-value">₹0.00</div>
        <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 8px;">
            Total Gross Sales
        </p>
    </div>

    <div class="stat-card">
        <p class="stat-label">ACTIVE ORDERS</p>
        <div class="stat-value">0</div>
        <p style="font-size: 0.8rem; color: var(--success); font-weight: 600; margin-top: 8px;">
            Live Processing
        </p>
    </div>

    <div class="stat-card">
        <p class="stat-label">LOW STOCK ITEMS</p>
        <div class="stat-value" style="color: var(--error);">0</div>
        <p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; margin-top: 8px;">
            Inventory Alerts
        </p>
    </div>
</div>

<div style="margin-top: 40px; display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Live Order Feed -->
    <div style="background: white; border-radius: 12px; border: 1px solid var(--border); overflow: hidden;">
        <div style="padding: 20px 24px; border-bottom: 2px solid var(--bg-body); display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-size: 1.1rem;">Live Order Queue</h3>
            <span style="font-size: 0.75rem; font-weight: 800; background: #fef2f2; color: #b91c1c; padding: 4px 10px; border-radius: 6px;">
                0 Pending
            </span>
        </div>
        
        <div style="padding: 60px; text-align: center;">
            <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: var(--text-muted); margin-bottom: 15px;">
                <i class="fas fa-receipt" style="font-size: 1.5rem;"></i>
            </div>
            <p style="color: var(--text-muted); font-size: 0.95rem;">No active orders in the current queue.</p>
        </div>
    </div>

    <!-- Quick Terminal Access -->
    <div style="background: white; border-radius: 12px; border: 1px solid var(--border); padding: 24px;">
        <h3 style="font-size: 1rem; margin-bottom: 25px;">Quick Actions</h3>
        
        <a href="pos.php" class="btn-primary" style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 12px; text-decoration: none;">
            <i class="fas fa-cash-register"></i> Open POS Terminal
        </a>
        
        <a href="products.php" style="display: flex; align-items: center; justify-content: center; gap: 10px; padding: 12px; border: 1px solid var(--border); border-radius: 8px; color: var(--text-main); font-weight: 600; font-size: 0.95rem; text-decoration: none;">
            <i class="fas fa-plus"></i> Add New Product
        </a>

        <div style="margin-top: 30px; padding: 15px; background: #eff6ff; border-radius: 10px; border-left: 4px solid var(--primary);">
            <p style="font-size: 0.85rem; color: var(--primary); font-weight: 800; margin-bottom: 5px;">REMINDER</p>
            <p style="font-size: 0.8rem; line-height: 1.4; color: var(--text-main);">Always verify inventory levels before opening the POS terminal.</p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
