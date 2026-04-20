<?php
require_once 'includes/header.php';
?>

<!-- Statistics Grid -->
<div class="stats-grid">
    <div class="stat-card glass">
        <div class="stat-icon" style="background: rgba(0, 196, 255, 0.1); color: #00c4ff;">
            <i class="fas fa-indian-rupee-sign"></i>
        </div>
        <div class="stat-info">
            <h3>Today's Sales</h3>
            <div class="value">₹0.00</div>
            <div class="trend up"><i class="fas fa-arrow-up"></i> 0% from yesterday</div>
        </div>
    </div>

    <div class="stat-card glass">
        <div class="stat-icon" style="background: rgba(255, 107, 107, 0.1); color: #ff6b6b;">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="stat-info">
            <h3>Live Orders</h3>
            <div class="value">0</div>
            <div class="trend">Awaiting POS start</div>
        </div>
    </div>

    <div class="stat-card glass">
        <div class="stat-icon" style="background: rgba(81, 207, 102, 0.1); color: #51cf66;">
            <i class="fas fa-table"></i>
        </div>
        <div class="stat-info">
            <h3>Active Tables</h3>
            <div class="value">0 / 12</div>
            <div class="trend">Dine-in tracking</div>
        </div>
    </div>

    <div class="stat-card glass">
        <div class="stat-icon" style="background: rgba(255, 146, 0, 0.1); color: #ff9200;">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <h3>Avg. Prep Time</h3>
            <div class="value">0.0m</div>
            <div class="trend">Kitchen efficiency</div>
        </div>
    </div>
</div>

<div class="dashboard-secondary-grid">
    <!-- Live KOTs -->
    <div class="data-card glass">
        <div class="card-header">
            <h2>Live KOTs</h2>
            <a href="orders.php" class="view-all">View Kitchen Display</a>
        </div>
        <div class="card-empty">
            <i class="fas fa-receipt"></i>
            <p>No active kitchen orders</p>
        </div>
    </div>

    <!-- Inventory Alerts -->
    <div class="data-card glass">
        <div class="card-header">
            <h2>Stock Alerts</h2>
            <a href="inventory.php" class="view-all">Manage Stock</a>
        </div>
        <div class="card-empty">
            <i class="fas fa-triangle-exclamation"></i>
            <p>All inventory levels healthy</p>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
