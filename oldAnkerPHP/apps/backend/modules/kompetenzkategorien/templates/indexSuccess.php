<?php
    // Need to use the helper
    use_helper("sfJqueryTreeDoctrine");
    echo get_nested_set_manager("KompetenzKategorien", "bezeichnung");
?>