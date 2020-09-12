    <?php // SVG Icons ?>
    <script>
        (function() {
            var
                xhr = new XMLHttpRequest(),
                url = '<?php echo get_template_directory_uri(); ?>/dist/spritemap.svg';
            xhr.open('GET', url, true);
            xhr.onload = function() {
                var div = document.createElement('div');
                div.className = 'hide-svg-icon';
                div.innerHTML = xhr.responseText;
                document.body.appendChild(div);
            };
            xhr.send();
        }());
    </script>
    <?php wp_footer(); ?>
</body>
</html>