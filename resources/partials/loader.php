<?php if(!defined('ABSPATH')){ exit; } ?>
<?php if(get_field("enable-loader", "options")): ?>
<div id="loader">
    <div id="wrapper">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_WXXDFD.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px;" loop autoplay></lottie-player>
    </div>
</div>
<?php endif; ?>