<?php
/**
 * RasoiSeva v3.0 - Enterprise Partner Registry
 */
$page_title = "Partner Registry";
$active_page = "tenants";
require_once 'includes/header.php';
require_once '../includes/config.php';

// Fetch Partners
$tenants = $conn->query("SELECT * FROM tenants ORDER BY created_at DESC");
?>

<div style="background: white; border-radius: 16px; border: 1px solid var(--border); overflow: hidden;">
    <div style="padding: 24px 30px; border-bottom: 2px solid var(--bg-body); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3 style="font-size: 1.15rem; font-weight: 800;">Enterprise Registry</h3>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Manage and monitor all restaurant partners.</p>
        </div>
        <a href="add_tenant.php" class="btn-primary" style="width: auto; padding: 10px 24px; text-decoration: none; font-size: 0.85rem;">
            <i class="fas fa-plus"></i> New Partner Onboarding
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #fcfcfd; border-bottom: 1px solid var(--border);">
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Partner Brand</th>
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Location</th>
                <th style="padding: 15px 30px; text-align: left; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Capabilities</th>
                <th style="padding: 15px 30px; text-align: right; font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($tenants->num_rows == 0): ?>
                <tr>
                    <td colspan="4" style="padding: 60px; text-align: center; color: var(--text-muted);">
                        No partners onboarded yet.
                    </td>
                </tr>
            <?php else: ?>
                <?php while($row = $tenants->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 15px 30px;">
                            <p style="font-weight: 800; color: var(--text-main);"><?php echo $row['business_name']; ?></p>
                            <p style="font-size: 0.75rem; color: var(--text-muted);"><?php echo $row['created_at']; ?></p>
                        </td>
                        <td style="padding: 15px 30px; font-size: 0.9rem; color: var(--text-muted);">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 15px 30px;">
                            <?php 
                            $mods = explode(',', $row['modules']);
                            foreach($mods as $m): 
                            ?>
                                <span style="font-size: 0.7rem; font-weight: 800; background: #eff6ff; color: var(--primary); padding: 4px 8px; border-radius: 6px; margin-right: 4px;">
                                    <?php echo $m; ?>
                                </span>
                            <?php endforeach; ?>
                        </td>
                        <td style="padding: 15px 30px; text-align: right;">
                            <button style="background: transparent; border: 1px solid var(--border); padding: 6px 12px; border-radius: 6px; color: var(--text-main); font-weight: 600; font-size: 0.8rem; cursor: pointer;">
                                Configure
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>
