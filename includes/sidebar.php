<?php
    $active_sidebar = isset($active_sidebar) ? $active_sidebar : '';
?>

<div class="logo">
    <a href="javascript:;" class="simple-text">
        Your Logo
    </a>
</div>
<ul class="nav">
    <li class="nav-item <?php echo $active_sidebar == "transactions" ? 'active' : ''; ?>">
        <a class="nav-link" href="transactions.php">
            <i class="nc-icon nc-icon nc-paper-2"></i>
            <p>Transactions</p>
        </a>
    </li>
    <li class="nav-item <?php echo $active_sidebar == "office" ? 'active' : ''; ?>">
        <a class="nav-link" href="office.php">
            <i class="nc-icon nc-bank"></i>
            <p>Office</p>
        </a>
    </li>
    <li class="nav-item <?php echo $active_sidebar == "employees" ? 'active' : ''; ?>">
        <a class="nav-link" href="employees.php">
            <i class="nc-icon nc-single-02"></i>
            <p>Employees</p>
        </a>
    </li>

    <li class="nav-item active active-pro">
        <a class="nav-link active" href="javascript:;">
            <i class="nc-icon nc-alien-33"></i>
            <p>Upgrade plan</p>
        </a>
    </li>
</ul>