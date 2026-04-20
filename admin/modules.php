<?php
/**
 * RasoiSeva - Module Management
 */
$page_title = "Module Control";
$active_page = "modules";
require_once 'includes/header.php';
?>

<div class="row items-center justify-between mb-8">
    <div>
        <p class="text-secondary">Manage and monitor core system modules</p>
    </div>
</div>

<div class="stats-grid mb-8">
    <div class="stat-card glass">
        <div class="stat-info">
            <h3>Total Modules</h3>
            <div class="value">6</div>
        </div>
    </div>
    <div class="stat-card glass">
        <div class="stat-info">
            <h3>System Health</h3>
            <div class="value" style="color: var(--success);">100%</div>
        </div>
    </div>
</div>

<div class="data-card glass">
    <div class="card-header">
        <h2>Core Module Catalog</h2>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Module Name</th>
                    <th>Category</th>
                    <th>Global Status</th>
                    <th>Engine</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar" style="background: rgba(255, 77, 77, 0.1); color: var(--primary-color);">
                                <i class="fa-solid fa-cash-register"></i>
                            </div>
                            <span>POS Terminal</span>
                        </div>
                    </td>
                    <td>Billing</td>
                    <td><span class="badge badge-active">Active</span></td>
                    <td>MariaDB / InnoDB</td>
                    <td><button class="btn btn-sm btn-outline">Settings</button></td>
                </tr>
                <tr>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar" style="background: rgba(0, 200, 83, 0.1); color: var(--success);">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>
                            <span>Inventory Engine</span>
                        </div>
                    </td>
                    <td>Operations</td>
                    <td><span class="badge badge-active">Active</span></td>
                    <td>Aria / FIFO</td>
                    <td><button class="btn btn-sm btn-outline">Settings</button></td>
                </tr>
                <tr>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar" style="background: rgba(0, 196, 255, 0.1); color: #00c4ff;">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <span>CRM & Loyalty</span>
                        </div>
                    </td>
                    <td>Growth</td>
                    <td><span class="badge badge-active">Active</span></td>
                    <td>Redis / SQL</td>
                    <td><button class="btn btn-sm btn-outline">Settings</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
