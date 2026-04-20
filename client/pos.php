<?php
/**
 * RasoiSeva v3.0 - High-Performance POS Billing Terminal
 */
$page_title = "POS Billing Terminal";
$active_page = "pos";
require_once 'includes/header.php';
require_once '../includes/config.php';

$tenant_id = $_SESSION['tenant_id'];

// Fetch Categories for the Quick-Filter sidebar
$categories = $conn->query("SELECT * FROM categories WHERE tenant_id = $tenant_id");
?>

<div style="display: grid; grid-template-columns: 1fr 380px; gap: 25px; height: calc(100vh - 180px);">
    
    <!-- LEFT: Menu & Products Selection -->
    <div style="display: flex; flex-direction: column; gap: 25px; overflow: hidden;">
        
        <!-- Category Quick-Filter Bar -->
        <div style="display: flex; gap: 10px; overflow-x: auto; padding-bottom: 10px; scrollbar-width: thin;">
            <button class="category-btn active" onclick="filterCategory('all')">All Items</button>
            <?php while($cat = $categories->fetch_assoc()): ?>
                <button class="category-btn" onclick="filterCategory(<?php echo $cat['id']; ?>)">
                    <?php echo $cat['category_name']; ?>
                </button>
            <?php endwhile; ?>
        </div>

        <!-- Product Grid -->
        <div id="product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 15px; overflow-y: auto; padding-right: 5px;">
            <?php
            $products = $conn->query("SELECT * FROM products WHERE tenant_id = $tenant_id AND status = 1");
            if ($products->num_rows == 0):
            ?>
                <div style="grid-column: 1 / -1; padding: 60px; text-align: center; background: white; border-radius: 16px; border: 1px dashed var(--border);">
                    <p style="color: var(--text-muted);">No products found. Please add products in the menu section.</p>
                </div>
            <?php else: ?>
                <?php while($p = $products->fetch_assoc()): ?>
                    <div class="product-card" onclick="addToCart(<?php echo htmlspecialchars(json_encode($p)); ?>)">
                        <div class="product-img">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <div class="product-info">
                            <p class="name"><?php echo $p['product_name']; ?></p>
                            <p class="price">₹<?php echo number_format($p['price'], 2); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- RIGHT: Cart & Final Billing -->
    <div style="background: white; border-radius: 20px; border: 1px solid var(--border); display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
        
        <div style="padding: 20px 25px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
            <h3 style="font-size: 1.1rem; font-weight: 800;">Digital Receipt</h3>
            <button onclick="clearCart()" style="background: none; border: none; color: var(--error); font-size: 0.8rem; font-weight: 700; cursor: pointer;">
                <i class="fas fa-trash"></i> CLEAR
            </button>
        </div>

        <!-- Live Cart Items -->
        <div id="cart-container" style="flex: 1; overflow-y: auto; padding: 20px;">
            <!-- Cart items injected by JS -->
            <div id="empty-cart-msg" style="text-align: center; padding: 40px 20px;">
                <i class="fas fa-shopping-basket" style="font-size: 2.5rem; color: #f1f5f9; margin-bottom: 15px; display: block;"></i>
                <p style="color: var(--text-muted); font-size: 0.85rem;">Select items to start billing</p>
            </div>
            <div id="cart-items-list"></div>
        </div>

        <!-- Calculation Matrix -->
        <div style="background: #f8fafc; padding: 25px; border-top: 1px solid var(--border);">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                <p style="color: var(--text-muted);">Sub Total</p>
                <p style="font-weight: 600;" id="sub-total">₹0.00</p>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 15px; font-size: 0.9rem;">
                <p style="color: var(--text-muted);">Taxes (GST 5%)</p>
                <p style="font-weight: 600;" id="tax-amount">₹0.00</p>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 2px dashed #cbd5e1; padding-top: 15px; margin-bottom: 25px;">
                <p style="font-weight: 800; font-size: 1.1rem;">PAYABLE</p>
                <p style="font-weight: 900; font-size: 1.5rem; color: var(--primary);" id="grand-total">₹0.00</p>
            </div>

            <button class="btn-primary" style="height: 60px; font-size: 1.1rem; box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);" onclick="processOrder()">
                <i class="fas fa-check-circle"></i> COMPLETE BILLING
            </button>
        </div>
    </div>

</div>

<!-- Internal CSS for POS Custom Components -->
<style>
.category-btn {
    padding: 10px 20px;
    background: white;
    border: 1px solid var(--border);
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.85rem;
    color: var(--text-muted);
    cursor: pointer;
    white-space: nowrap;
    transition: 0.2s;
}
.category-btn.active, .category-btn:hover {
    background: var(--primary);
    color: white;
    border-color: var(--primary);
}

.product-card {
    background: white;
    border: 1px solid var(--border);
    border-radius: 16px;
    padding: 12px;
    cursor: pointer;
    transition: 0.2s;
}
.product-card:hover {
    border-color: var(--primary);
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.05);
}
.product-img {
    height: 100px;
    background: #f1f5f9;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #cbd5e1;
    margin-bottom: 12px;
}
.product-info .name { font-weight: 700; font-size: 0.9rem; margin-bottom: 4px; }
.product-info .price { color: var(--primary); font-weight: 800; font-size: 1rem; }

.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f1f5f9;
}
</style>

<!-- Load POS Script -->
<script src="../assets/js/pos_engine.js"></script>

<?php require_once 'includes/footer.php'; ?>
