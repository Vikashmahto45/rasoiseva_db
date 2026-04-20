<?php
/**
 * RasoiSeva - Restaurant Onboarding (Cleaned & Rewritten)
 */
$page_title = "Onboarding Center";
$active_page = "tenants";
require_once 'includes/header.php';
?>

<div class="table-container animate-fade">
    <div class="table-header">
        <h2 style="font-weight: 800;">Register New Business</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Configure enterprise settings for your new restaurant partner.</p>
    </div>

    <form action="tenant_process.php" method="POST" style="padding: 30px;">
        <!-- Brand Info -->
        <div class="form-group">
            <h3 style="color: var(--primary); font-size: 0.9rem; text-transform: uppercase; margin-bottom: 20px;">1. Brand Information</h3>
            <div class="grid-2">
                <div>
                    <label class="form-label">Restaurant Brand Name</label>
                    <input type="text" name="business_name" class="form-control" placeholder="e.g. Spice Valley" required>
                </div>
                <div>
                    <label class="form-label">Corporate Location</label>
                    <input type="text" name="location" class="form-control" placeholder="City, State" required>
                </div>
            </div>
        </div>

        <!-- Access Control -->
        <div class="form-group" style="margin-top: 40px;">
            <h3 style="color: var(--primary); font-size: 0.9rem; text-transform: uppercase; margin-bottom: 20px;">2. Administrative Access</h3>
            <div class="grid-2">
                <div>
                    <label class="form-label">Authorized Email Address</label>
                    <input type="email" name="owner_email" class="form-control" placeholder="admin@restaurant.com" required>
                </div>
                <div>
                    <label class="form-label">Initial Master Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter secure password" required>
                </div>
            </div>
        </div>

        <!-- Modules Allocation -->
        <div class="form-group" style="margin-top: 40px;">
            <h3 style="color: var(--primary); font-size: 0.9rem; text-transform: uppercase; margin-bottom: 20px;">3. Feature Allocation</h3>
            <div class="flex gap-10" style="flex-wrap: wrap;">
                <label style="background: var(--bg-main); padding: 15px 20px; border-radius: 12px; border: 1px solid var(--border); cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="POS" checked> <span>POS Terminal</span>
                </label>
                <label style="background: var(--bg-main); padding: 15px 20px; border-radius: 12px; border: 1px solid var(--border); cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="Inventory" checked> <span>Inventory</span>
                </label>
                <label style="background: var(--bg-main); padding: 15px 20px; border-radius: 12px; border: 1px solid var(--border); cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="CRM"> <span>CRM Loyalty</span>
                </label>
            </div>
        </div>

        <div class="flex jcsb aic" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--border);">
            <a href="tenants.php" style="color: var(--text-muted); text-decoration: none;">Cancel Request</a>
            <button type="submit" class="btn btn-primary" style="padding: 15px 40px;">
                <i class="fa-solid fa-rocket"></i> Initialize Live Environment
            </button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
