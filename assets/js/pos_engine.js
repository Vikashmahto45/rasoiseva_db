/**
 * RasoiSeva v3.0 - Intelligent POS Engine (Indigo Corporate)
 * STRICTLY NEW CODE - NO BLOAT
 */

let cart = [];

function addToCart(product) {
    // Check if product already in cart
    const existingIndex = cart.findIndex(item => item.id === product.id);
    
    if (existingIndex > -1) {
        cart[existingIndex].qty += 1;
    } else {
        cart.push({
            id: product.id,
            name: product.product_name,
            price: parseFloat(product.price),
            qty: 1
        });
    }
    
    renderCart();
}

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    renderCart();
}

function updateQty(id, delta) {
    const item = cart.find(i => i.id === id);
    if (item) {
        item.qty += delta;
        if (item.qty <= 0) removeFromCart(id);
        else renderCart();
    }
}

function clearCart() {
    if (confirm("Are you sure you want to clear the current bill?")) {
        cart = [];
        renderCart();
    }
}

function renderCart() {
    const list = document.getElementById('cart-items-list');
    const msg = document.getElementById('empty-cart-msg');
    
    if (cart.length === 0) {
        msg.style.display = 'block';
        list.innerHTML = '';
        calculateTotals(0);
        return;
    }

    msg.style.display = 'none';
    list.innerHTML = cart.map(item => `
        <div class="cart-item">
            <div>
                <p style="font-weight: 700; font-size: 0.9rem;">${item.name}</p>
                <p style="font-size: 0.8rem; color: var(--text-muted);">₹${item.price} x ${item.qty}</p>
            </div>
            <div style="display: flex; align-items: center; gap: 15px;">
                <div style="display: flex; gap: 8px; align-items: center;">
                    <button onclick="updateQty(${item.id}, -1)" style="width:24px;height:24px;border-radius:6px;border:1px solid #ddd;background:white;cursor:pointer;">-</button>
                    <span style="font-weight: 800; font-size: 0.9rem; min-width: 20px; text-align: center;">${item.qty}</span>
                    <button onclick="updateQty(${item.id}, 1)" style="width:24px;height:24px;border-radius:6px;border:1px solid #ddd;background:white;cursor:pointer;">+</button>
                </div>
                <p style="font-weight: 800; color: var(--text-main); font-size: 0.95rem; min-width: 60px; text-align: right;">
                    ₹${(item.price * item.qty).toFixed(2)}
                </p>
                <button onclick="removeFromCart(${item.id})" style="color: #ef4444; border:none; background:none; cursor:pointer; font-size: 0.9rem;">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
        </div>
    `).join('');

    const subTotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
    calculateTotals(subTotal);
}

function calculateTotals(subTotal) {
    const taxRate = 0.05; // 5% GST
    const tax = subTotal * taxRate;
    const grandTotal = subTotal + tax;

    document.getElementById('sub-total').innerText = '₹' + subTotal.toFixed(2);
    document.getElementById('tax-amount').innerText = '₹' + tax.toFixed(2);
    document.getElementById('grand-total').innerText = '₹' + grandTotal.toFixed(2);
}

function processOrder() {
    if (cart.length === 0) {
        alert("Please add items to the cart before completing the bill.");
        return;
    }

    if (confirm("Proceed to complete this transaction?")) {
        alert("Transaction Initialized! (Backend integration coming in next phase)");
        // In the next step, we'll build the order_process.php to save this to SQL
    }
}

function filterCategory(catId) {
    alert("Category filter applied for ID: " + catId + " (Live filter logic coming next)");
}
