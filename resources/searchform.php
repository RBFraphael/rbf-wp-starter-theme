<?php if(!defined('ABSPATH')){ exit; } ?>
<form action="<?= get_bloginfo("url"); ?>" method="get">
    <div class="input-group">
        <input type="text" name="s" id="s" class="form-control" required="required" placeholder="<?= __("Search for...", "rbf-wp-starter-theme"); ?>">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary px-3"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
