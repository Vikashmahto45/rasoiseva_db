<?php
$page_title = "Manage Tenants";
$active_page = "tenants";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Fetch all tenants
$tenants = $conn->query("SELECT * FROM tenants ORDER BY created_at DESC");
?>

<div class="actions-bar" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h3 style="color: var(--text-secondary);"><?php echo $tenants->num_rows; ?> Restaurants Registered</h3>
    <a href="add_tenant.php" class="btn-primary" style="width: auto; padding: 12px 25px; text-decoration: none;">
        <i class="fa-solid fa-plus"></i> Add New Restaurant
    </a>
</div>

<div class="tenants-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px;">
    <?php if ($tenants->num_rows == 0): ?>
        <div class="glass-card" style="grid-column: 1/-1; padding: 60px; text-align: center;">
            <i class="fa-solid fa-store-slash" style="font-size: 3rem; color: var(--border); margin-bottom: 20px;"></i>
            <h3 style="color: var(--text-secondary);">Your platform is empty. Start by adding your first restaurant.</h3>
            <a href="add_tenant.php" style="color: var(--primary-color); text-decoration: none; margin-top: 10px; display: inline-block;">Onboard Now</a>
        </div>
    <?php else: 
        while($t = $tenants->fetch_assoc()): ?>
        <div class="tenant-card glass-card" style="padding: 25px; transition: transform 0.3s ease;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div class="logo-box" style="width: 50px; height: 50px; background: var(--bg-dark); border: 1px solid var(--border); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-utensils" style="color: var(--primary-color);"></i>
                </div>
                <span class="badge badge-active"><?php echo ucfirst($t['status']); ?></span>
            </div>
            <h3 style="margin-bottom: 5px;"><?php echo $t['business_name']; ?></h3>
            <p style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 20px;"><?php echo $t['location'] ?: 'Location Not Set'; ?></p>
            
            <div class="module-tags" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 25px;">
                <span style="font-size: 0.75rem; background: var(--glass); padding: 4px 10px; border-radius: 4px;">POS</span>
                <span style="font-size: 0.75rem; background: var(--glass); padding: 4px 10px; border-radius: 4px;">Inventory</span>
            </div>

            <div style="display: flex; gap: 10px; padding-top: 20px; border-top: 1px solid var(--border);">
                <a href="manage_modules.php?id=<?php echo $t['id']; ?>" class="btn-primary" style="background: var(--bg-dark); border: 1px solid var(--border); font-size: 0.8rem; padding: 8px;">Edit Modules</a>
                <a href="view_tenant.php?id=<?php echo $t['id']; ?>" class="btn-primary" style="font-size: 0.8rem; padding: 8px;">Overview</a>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
