<?php
/**
 * RasoiSeva v3.0 - Sales Performance Reports (Client)
 */
$page_title = "Business Analytics";
$active_page = "reports";
require_once 'includes/header.php';
?>

<div class="stat-grid">
    <div class="stat-card">
        <p class="stat-label">GROSS SALES (MTD)</p>
        <div class="stat-value">₹0.00</div>
    </div>
    <div class="stat-card">
        <p class="stat-label">AVERAGE ORDER VALUE</p>
        <div class="stat-value">₹0.00</div>
    </div>
</div>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); padding: 50px; text-align: center; margin-top: 40px;">
    <div style="width: 80px; height: 80px; background: #eff6ff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; color: var(--primary); margin-bottom: 20px;">
        <i class="fas fa-chart-bar" style="font-size: 2rem;"></i>
    </div>
    <h3 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 10px;">Analytics Engine Ready</h3>
    <p style="color: var(--text-muted); max-width: 400px; margin: 0 auto; font-size: 0.95rem;">
        The reporting engine is awaiting your first sales data to generate professional performance charts.
    </p>
</div>

<?php require_once 'includes/footer.php'; ?>
