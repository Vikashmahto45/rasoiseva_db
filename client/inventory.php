<?php
/**
 * RasoiSeva v3.0 - Restaurant Inventory Control
 */
$page_title = "Inventory Control";
$active_page = "inventory";
require_once 'includes/header.php';
?>

<div class="stat-grid">
    <div class="stat-card">
        <p class="stat-label">TOTAL SKU'S</p>
        <div class="stat-value">0 Items</div>
    </div>
    <div class="stat-card">
        <p class="stat-label">STOCK ALERT</p>
        <div class="stat-value" style="color: var(--success);">All Safe</div>
    </div>
</div>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; margin-top: 40px;">
    <div style="padding: 24px 30px; border-bottom: 2px solid var(--bg-body); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3 style="font-size: 1.15rem; font-weight: 800;">Raw Material Registry</h3>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Manage stock, wastage, and refilling.</p>
        </div>
    </div>

    <div style="padding: 60px; text-align: center; color: var(--text-muted);">
        <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
            <i class="fas fa-boxes" style="font-size: 1.5rem;"></i>
        </div>
        <p style="font-size: 0.95rem;">Inventory ledger is currently empty. Initialize your stock registry to begin.</p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
