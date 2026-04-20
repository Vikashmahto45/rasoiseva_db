<?php
/**
 * RasoiSeva v3.0 - Pro Enterprise Onboarding
 */
$page_title = "Onboard New Partner";
$active_page = "tenants";
require_once 'includes/header.php';
?>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; max-width: 800px; margin: 0 auto;" class="animate-fade">
    <div style="padding: 30px 40px; border-bottom: 1px solid var(--border); background: #fcfcfd;">
        <h3 style="font-size: 1.25rem; font-weight: 800;">Register New Restaurant Partner</h3>
        <p style="color: var(--text-muted); font-size: 0.9rem;">Initialize a new high-availability environment for your client.</p>
    </div>

    <form action="tenant_process.php" method="POST" style="padding: 40px;">
        
        <!-- Part 1: Brand & Location -->
        <div style="margin-bottom: 40px;">
            <p style="font-size: 0.75rem; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">1. Brand Information</p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-field">
                    <label class="form-label">Enterprise Brand Name</label>
                    <input type="text" name="business_name" class="form-input" placeholder="e.g. Royal Spice Kitchen" required>
                </div>
                <div class="form-field">
                    <label class="form-label">Corporate Location</label>
                    <input type="text" name="location" class="form-input" placeholder="City, State" required>
                </div>
            </div>
        </div>

        <!-- Part 2: Governance -->
        <div style="margin-bottom: 40px;">
            <p style="font-size: 0.75rem; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">2. Account Governance</p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-field">
                    <label class="form-label">Master Account Email</label>
                    <input type="email" name="owner_email" class="form-input" placeholder="admin@enterprise.com" required>
                </div>
                <div class="form-field">
                    <label class="form-label">New Environment Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Create secure password" required>
                </div>
            </div>
        </div>

        <!-- Part 3: Capabilities -->
        <div style="margin-bottom: 40px;">
            <p style="font-size: 0.75rem; font-weight: 800; color: var(--primary); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">3. Service Capabilities</p>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; background: var(--bg-body); border: 1px solid var(--border); border-radius: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="POS" checked style="accent-color: var(--primary);">
                    <span style="font-weight: 600; font-size: 0.9rem;">POS Engine</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; background: var(--bg-body); border: 1px solid var(--border); border-radius: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="Inventory" checked style="accent-color: var(--primary);">
                    <span style="font-weight: 600; font-size: 0.9rem;">Inventory Control</span>
                </label>
                <label style="display: flex; align-items: center; gap: 10px; padding: 12px 20px; background: var(--bg-body); border: 1px solid var(--border); border-radius: 10px; cursor: pointer;">
                    <input type="checkbox" name="modules[]" value="CRM" style="accent-color: var(--primary);">
                    <span style="font-weight: 600; font-size: 0.9rem;">CRM & Marketing</span>
                </label>
            </div>
        </div>

        <div style="margin-top: 50px; padding-top: 30px; border-top: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
            <a href="tenants.php" style="color: var(--text-muted); text-decoration: none; font-weight: 600; font-size: 0.9rem;">Cancel Request</a>
            <button type="submit" class="btn-primary" style="width: auto; padding: 12px 40px;">
                Initialize Environment
            </button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
