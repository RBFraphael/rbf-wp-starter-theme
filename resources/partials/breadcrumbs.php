<?php if(!defined('ABSPATH')){ exit; } ?>
<?php if(!is_front_page() && function_exists("bcn_display")): ?>
<nav class="container-fluid py-3 breadcrumbs">
    <div class="row px-2 px-lg-5">
        <div class="col-12">
            <?php bcn_display(); ?>
        </div>
    </div>
</nav>
<?php endif; ?>