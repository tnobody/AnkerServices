<div id="search">
    <form action="<?php echo url_for('kompetenzen/search') ?>" method="get">
            <p>Geben Sie einen oder mehrere Suchbegriffe ein</p>
        <div style="width: 650px;">
            <input type="submit" value="Suchen" />
            <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
            <br />
            <?php echo image_tag('ajax-loader.gif', 'id=loader style=vertical-align: middle; display: none;') ?>
        </div>
    </form>
</div>
