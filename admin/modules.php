<?php
/**
 * RasoiSeva - Module Management (Cleaned)
 */
$page_title = "Module Control";
$active_page = "modules";
require_once 'includes/header.php';
?>

<div class="dashboard-grid">
    <div class="card">
        <div class="card-title">Total Modules</div>
        <div class="card-value">6</div>
    </div>
    <div class="card">
        <div class="card-title">System Health</div>
        <div class="card-value" style="color: var(--success);">100%</div>
    </div>
</div>

<div class="table-container">
    <div class="table-header">
        <h3>Core Module Catalog</h3>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Module Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>POS Terminal</strong></td>
                <td>Billing</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-sm btn-primary">Config</button></td>
            </tr>
            <tr>
                <td><strong>Inventory Engine</strong></td>
                <td>Operations</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-sm btn-primary">Config</button></td>
            </tr>
            <tr>
                <td><strong>CRM & Loyalty</strong></td>
                <td>Growth</td>
                <td><span class="badge badge-success">Active</span></td>
                <td><button class="btn btn-sm btn-primary">Config</button></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
