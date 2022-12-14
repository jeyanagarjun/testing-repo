<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<svg class="d-none">
    <defs>
        <symbol id="icon-cross" viewBox="0 0 24 24">
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
        </symbol>
    </defs>
</svg>
<div class="searchOverlay page">
    <button id="btn-searchOverlay-close" class="btn btn--searchOverlay-close" aria-label="Close searchOverlay form">
        <svg class="icon icon--cross">
            <use xlink:href="#icon-cross"></use>
        </svg>
    </button>


    <div class="searchOverlay__inner  searchOverlay__inner--up">


        <div class="container">
            <form>
                <input class="searchOverlay__input" id="keyword" name="keyword" type="text"
                    placeholder="<?php esc_attr_e('Search A Track', 'rekord'); ?>" autocomplete="off" spellcheck="false"
                    onkeyup="fetch()" />
            
            </form>
        </div>
    </div>
    <div class="searchOverlay__inner searchOverlay__inner--down">
        <div class="container d-flex">
            <div class="searchOverlay__suggestion">
                <div id="datafetch" class="slimScroll" data-color="rgb(255, 23, 68)" data-visible="true" data-size="5"
                    data-Opacity=".9" data-height="400">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>