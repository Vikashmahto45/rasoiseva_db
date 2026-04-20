<?php
/**
 * RasoiSeva v3.0 - System Core Engines (Admin)
 */
$page_title = "Core Engines";
$active_page = "modules";
require_once 'includes/header.php';
?>

<div class="stat-grid">
    <div class="stat-card">
        <p class="stat-label">TOTAL MODULES</p>
        <div class="stat-value">6 Solid</div>
    </div>
    <div class="stat-card">
        <p class="stat-label">ENGINE UPTIME</p>
        <div class="stat-value" style="color: var(--success);">99.9%</div>
    </div>
</div>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; margin-top: 40px;">
    <div style="padding: 24px 30px; border-bottom: 2px solid var(--bg-body);">
        <h3 style="font-size: 1.15rem; font-weight: 800;">System Module Catalog</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Master switches for the enterprise engine.</p>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #fcfcfd; border-bottom: 1px solid var(--border);">
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase;">Engine Name</th>
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase;">Category</th>
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase;">Status</th>
                <th style="padding: 15px 30px; text-align: right; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 18px 30px;"><strong>POS Billing Terminal</strong></td>
                <td style="padding: 18px 30px; color: var(--text-muted);">Front-end Ops</td>
                <td style="padding: 18px 30px;"><span style="color: var(--success); font-weight: 700;">● Active</span></td>
                <td style="padding: 18px 30px; text-align: right;"><button style="background:transparent; border:1px solid var(--border); padding:6px 12px; border-radius:6px; cursor:pointer;">Settings</button></td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 18px 30px;"><strong>Inventory Automator</strong></td>
                <td style="padding: 18px 30px; color: var(--text-muted);">Backend Ops</td>
                <td style="padding: 18px 30px;"><span style="color: var(--success); font-weight: 700;">● Active</span></td>
                <td style="padding: 18px 30px; text-align: right;"><button style="background:transparent; border:1px solid var(--border); padding:6px 12px; border-radius:6px; cursor:pointer;">Settings</button></td>
            </tr>
            <tr style="border-bottom: 1px solid var(--border);">
                <td style="padding: 18px 30px;"><strong>CRM & Marketing</strong></td>
                <td style="padding: 18px 30px; color: var(--text-muted);">Growth</td>
                <td style="padding: 18px 30px;"><span style="color: var(--text-muted);">○ Maintenance</span></td>
                <td style="padding: 18px 30px; text-align: right;"><button style="background:transparent; border:1px solid var(--border); padding:6px 12px; border-radius:6px; cursor:pointer;">Settings</button></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
