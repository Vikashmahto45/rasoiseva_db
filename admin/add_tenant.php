<?php
$page_title = "Onboard New Restaurant";
$active_page = "tenants";
require_once 'includes/header.php';
?>

<div class="form-wrapper glass-card" style="max-width: 800px; margin: 0 auto; padding: 40px;">
    <div style="margin-bottom: 30px; border-bottom: 1px solid var(--border); padding-bottom: 20px;">
        <h2 style="margin-bottom: 10px;">Restaurant Onboarding</h2>
        <p style="color: var(--text-secondary);">Register a new client business and initialize their enterprise environment.</p>
    </div>

    <?php display_flash_message(); ?>

    <form action="tenant_process.php" method="POST">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
            <div class="form-section">
                <h4 style="margin-bottom: 20px; color: var(--primary-color);">Business Details</h4>
                <div class="input-group">
                    <label for="business_name">Restaurant Name</label>
                    <input type="text" id="business_name" name="business_name" placeholder="e.g. Spice Route Kitchen" required>
                </div>
                <div class="input-group">
                    <label for="location">Location / City</label>
                    <input type="text" id="location" name="location" placeholder="e.g. Bikaner, Rajasthan" required>
                </div>
            </div>

            <div class="form-section">
                <h4 style="margin-bottom: 20px; color: var(--primary-color);">Account Owner</h4>
                <div class="input-group">
                    <label for="owner_email">Owner Email Address</label>
                    <input type="email" id="owner_email" name="owner_email" placeholder="owner@example.com" required>
                </div>
                <div class="input-group">
                    <label for="password">Initial Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <p style="font-size: 0.75rem; color: var(--text-secondary); margin-top: 5px;">Client will use this to access their dashboard.</p>
                </div>
            </div>
        </div>

        <div class="module-selection" style="margin-top: 40px; padding: 30px; background: var(--bg-dark); border-radius: 12px; border: 1px solid var(--border);">
            <h4 style="margin-bottom: 20px;">Enable Core Modules</h4>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="pos" checked> POS Billing
                </label>
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="inventory" checked> Inventory
                </label>
                <label style="display: flex; align-items: center; gap: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="crm"> CRM & Marketing
                </label>
            </div>
        </div>

        <div style="margin-top: 40px; display: flex; gap: 15px; justify-content: flex-end;">
            <a href="tenants.php" class="btn-primary" style="width: auto; background: transparent; border: 1px solid var(--border); text-decoration: none;">Cancel</a>
            <button type="submit" class="btn-primary" style="width: auto; padding: 12px 40px;">Initialize Tenant</button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
