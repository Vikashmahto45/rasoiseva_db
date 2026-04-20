<?php
/**
 * RasoiSeva v2.0 - Advanced Partner Onboarding
 */
$page_title = "Onboarding Center";
$active_page = "tenants";
require_once 'includes/header.php';
?>

<div class="table-container glass-effect animate-fade">
    <div class="table-header">
        <h3 style="font-weight: 800;">Register New Enterprise Partner</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem;">Configure the high-availability environment for your new restaurant client.</p>
    </div>

    <form action="tenant_process.php" method="POST" style="padding: 40px;">
        <!-- Brand Credentials -->
        <div style="margin-bottom: 50px;">
            <p style="color: var(--brand-primary); font-weight: 800; font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 25px;">1. BRAND IDENTITY</p>
            <div class="grid-2">
                <div class="input-container">
                    <label>Enterprise Brand Name</label>
                    <input type="text" name="business_name" class="input-field" placeholder="e.g. Royal Spice Kitchen" required>
                </div>
                <div class="input-container">
                    <label>Corporate Headquarters</label>
                    <input type="text" name="location" class="input-field" placeholder="City, State" required>
                </div>
            </div>
        </div>

        <!-- System Governance -->
        <div style="margin-bottom: 50px;">
            <p style="color: var(--brand-primary); font-weight: 800; font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 25px;">2. GOVERNANCE & ACCESS</p>
            <div class="grid-2">
                <div class="input-container">
                    <label>Primary Administrative Email</label>
                    <input type="email" name="owner_email" class="input-field" placeholder="admin@enterprise.com" required>
                </div>
                <div class="input-container">
                    <label>Master Environment Password</label>
                    <input type="password" name="password" class="input-field" placeholder="Secure unique password" required>
                </div>
            </div>
        </div>

        <!-- Capability Matrix -->
        <div style="margin-bottom: 50px;">
            <p style="color: var(--brand-primary); font-weight: 800; font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 25px;">3. CAPABILITY ALLOCATION</p>
            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <label style="background: var(--bg-dark-950); padding: 18px 25px; border-radius: 18px; border: 1px solid var(--border-soft); cursor: pointer; display: flex; align-items: center; gap: 12px; transition: 0.3s;" onmouseover="this.style.borderColor='var(--brand-primary)'" onmouseout="this.style.borderColor='var(--border-soft)'">
                    <input type="checkbox" name="modules[]" value="POS" checked style="accent-color: var(--brand-primary); width: 18px; height: 18px;">
                    <span style="font-weight: 600; font-size: 0.95rem;">POS Terminal Engine</span>
                </label>
                <label style="background: var(--bg-dark-950); padding: 18px 25px; border-radius: 18px; border: 1px solid var(--border-soft); cursor: pointer; display: flex; align-items: center; gap: 12px; transition: 0.3s;" onmouseover="this.style.borderColor='var(--brand-primary)'" onmouseout="this.style.borderColor='var(--border-soft)'">
                    <input type="checkbox" name="modules[]" value="Inventory" checked style="accent-color: var(--brand-primary); width: 18px; height: 18px;">
                    <span style="font-weight: 600; font-size: 0.95rem;">Inventory Control</span>
                </label>
                <label style="background: var(--bg-dark-950); padding: 18px 25px; border-radius: 18px; border: 1px solid var(--border-soft); cursor: pointer; display: flex; align-items: center; gap: 12px; transition: 0.3s;" onmouseover="this.style.borderColor='var(--brand-primary)'" onmouseout="this.style.borderColor='var(--border-soft)'">
                    <input type="checkbox" name="modules[]" value="CRM" style="accent-color: var(--brand-primary); width: 18px; height: 18px;">
                    <span style="font-weight: 600; font-size: 0.95rem;">CRM & Loyalty</span>
                </label>
            </div>
        </div>

        <div class="jcsb aic flex" style="margin-top: 60px; padding-top: 40px; border-top: 1px solid var(--border-soft);">
            <a href="tenants.php" style="color: var(--text-muted); text-decoration: none; font-weight: 600;">Cancel Onboarding</a>
            <button type="submit" class="btn-v2" style="width: auto; padding: 18px 60px;">
                <i class="fas fa-rocket"></i>
                <span>Initialize v2.0 Environment</span>
            </button>
        </div>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
