<?php
    add_filter( 'rank_math/json_ld', function( $data, $jsonld ) {
        return [];
    }, 99, 2);
?>