<?php
/**
 * RasoiSeva - Subscription & Billing Management
 */
$page_title = "Subscriptions";
$active_page = "billing";
require_once 'includes/header.php';
?>

<div class="row items-center justify-between mb-8">
    <div>
        <p class="text-secondary">Overview of all active plans and revenue</p>
    </div>
</div>

<div class="stats-grid mb-8">
    <div class="stat-card glass">
        <div class="stat-info">
            <h3>Monthly Revenue</h3>
            <div class="value">₹0.00</div>
        </div>
    </div>
    <div class="stat-card glass">
        <div class="stat-info">
            <h3>Active Plans</h3>
            <div class="value">0</div>
        </div>
    </div>
    <div class="stat-card glass">
        <div class="stat-info">
            <h3>Pending Renewals</h3>
            <div class="value">0</div>
        </div>
    </div>
</div>

<div class="data-card glass">
    <div class="card-header">
        <h2>Subscription Distribution</h2>
    </div>
    
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Plan Name</th>
                    <th>Subscribers</th>
                    <th>Price / Mo</th>
                    <th>Modules Included</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Basic</strong></td>
                    <td>0</td>
                    <td>₹1,499</td>
                    <td>POS + Basic Reports</td>
                    <td><button class="btn btn-sm btn-outline">Edit Plan</button></td>
                </tr>
                <tr>
                    <td><strong>Premium</strong></td>
                    <td>0</td>
                    <td>₹2,999</td>
                    <td>POS + Inventory + CRM</td>
                    <td><button class="btn btn-sm btn-outline">Edit Plan</button></td>
                </tr>
                <tr>
                    <td><strong>Enterprise</strong></td>
                    <td>0</td>
                    <td>₹4,999</td>
                    <td>Full Suite (All Modules)</td>
                    <td><button class="btn btn-sm btn-outline">Edit Plan</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
