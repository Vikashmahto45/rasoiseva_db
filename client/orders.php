<?php
/**
 * RasoiSeva v3.0 - Restaurant Orders List
 */
$page_title = "Orders Registry";
$active_page = "orders";
require_once 'includes/header.php';
?>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); overflow: hidden;">
    <div style="padding: 24px 30px; border-bottom: 2px solid var(--bg-body); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3 style="font-size: 1.15rem; font-weight: 800;">Digital Sales Journal</h3>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Real-time transaction historical records.</p>
        </div>
        <a href="pos.php" class="btn-primary" style="width: auto; padding: 10px 24px; text-decoration: none; font-size: 0.85rem;">
            <i class="fas fa-plus"></i> New Sale
        </a>
    </div>

    <div style="padding: 60px; text-align: center; color: var(--text-muted);">
        <div style="width: 60px; height: 60px; background: #f8fafc; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 15px;">
            <i class="fas fa-history" style="font-size: 1.5rem;"></i>
        </div>
        <p style="font-size: 0.95rem;">No historical orders found for the current filter.</p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
