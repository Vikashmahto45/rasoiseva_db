<?php
/**
 * RasoiSeva - Add Tenant UI (Cleaned)
 */
$page_title = "Restaurant Onboarding";
$active_page = "tenants";
require_once 'includes/header.php';
?>

<div class="data-card animate-fade">
    <div class="card-header">
        <div>
            <h2>Register New Restaurant</h2>
            <p class="text-secondary">Onboard a new client business and initialize their enterprise environment.</p>
        </div>
    </div>

    <form action="tenant_process.php" method="POST" style="padding: 30px;">
        <!-- Section 1: Business Details -->
        <div class="form-section">
            <h3>Business Details</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Restaurant Name</label>
                    <input type="text" name="business_name" placeholder="e.g. Spice Route Kitchen" required>
                </div>
                <div class="form-group">
                    <label>Location / City</label>
                    <input type="text" name="location" placeholder="e.g. Bikaner, Rajasthan" required>
                </div>
            </div>
        </div>

        <!-- Section 2: Account Owner -->
        <div class="form-section">
            <h3>Account Access</h3>
            <div class="form-row">
                <div class="form-group">
                    <label>Owner Email Address</label>
                    <input type="email" name="owner_email" placeholder="owner@example.com" required>
                </div>
                <div class="form-group">
                    <label>Initial Dashboard Password</label>
                    <input type="password" name="password" placeholder="Create a secure password" required>
                </div>
            </div>
        </div>

        <!-- Section 3: Modules -->
        <div class="form-section">
            <h3>Enable Core Modules</h3>
            <div class="module-grid">
                <label class="module-item">
                    <input type="checkbox" name="modules[]" value="POS" checked>
                    <span>POS Billing Terminal</span>
                </label>
                <label class="module-item">
                    <input type="checkbox" name="modules[]" value="Inventory" checked>
                    <span>Inventory Engine</span>
                </label>
                <label class="module-item">
                    <input type="checkbox" name="modules[]" value="CRM">
                    <span>CRM & Marketing</span>
                </label>
            </div>
        </div>

        <div class="flex justify-between items-center" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--border);">
            <a href="tenants.php" class="text-secondary" style="text-decoration: none;">Cancel</a>
            <button type="submit" class="btn btn-primary" style="min-width: 200px;">
                <i class="fa-solid fa-rocket"></i> Initialize Tenant
            </button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
