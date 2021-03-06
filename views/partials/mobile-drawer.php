<?php if(!defined('ABSPATH')){ exit; } ?>
<div class="drawer shadow bg-light">
    <div class="row">
        <div class="col-12">
            <div class="bg-primary px-4 py-5">
                <?php if($drawer_logo = get_field("drawer-logo", "options")): ?>
                <img src="<?= $drawer_logo; ?>" alt="<?= get_bloginfo("name"); ?>" class="img-fluid lazy">
                <?php else: ?>
                <h1 class="fw-bold"><?= get_bloginfo("name"); ?></h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <?php do_action("header-menu-mobile"); ?>
        </div>
    </div>
</div>
<div class="drawer-overlay d-none"></div>
