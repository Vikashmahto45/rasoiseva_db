<?php
/**
 * RasoiSeva - Subscriptions Management (Cleaned)
 */
$page_title = "Subscriptions";
$active_page = "billing";
require_once 'includes/header.php';
?>

<div class="dashboard-grid">
    <div class="card">
        <div class="card-title">Monthly Revenue</div>
        <div class="card-value">₹0.00</div>
    </div>
    <div class="card">
        <div class="card-title">Active Plans</div>
        <div class="card-value">0</div>
    </div>
</div>

<div class="table-container">
    <div class="table-header jcsb aic flex">
        <h3>Subscription Plans</h3>
        <button class="btn btn-sm btn-primary">+ New Plan</button>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>Plan Name</th>
                <th>Price / Mo</th>
                <th>Subscribers</th>
                <th>Features</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Basic</strong></td>
                <td>₹1,499</td>
                <td>0</td>
                <td>POS + Basic Analytics</td>
            </tr>
            <tr>
                <td><strong>Premium</strong></td>
                <td>₹2,999</td>
                <td>0</td>
                <td>POS + Inventory + CRM</td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
