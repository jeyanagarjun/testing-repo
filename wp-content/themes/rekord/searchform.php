<?php
/**
 * The template for displaying search forms in rekord
 *
 * @author    xvelopers
 * @package   rekord
 * @version   1.0.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="search-field form-control"
        placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'rekord' ); ?>"
        value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
    <button class="btn btn-link search-submit" type="submit"><i class="icon icon-search s-24"></i></button>
</form>