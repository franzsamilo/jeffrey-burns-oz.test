<?php
/**
 * Title: Site Footer
 * Slug: dreamsmile/site-footer
 * Categories: dreamsmile
 * Inserter: no
 *
 * The footer body, rendered from parts/footer.html. It is a PHP pattern
 * rather than static HTML because some of its links depend on the site:
 *   - "Areas We Serve" lists the 8 /contact-us/ town pages from
 *     ds_town_pages() (SEO tracker R29: no page linked to them).
 *   - Privacy Policy and Disclaimer only appear once those pages are
 *     published, so the footer never links to a 404 (tracker R30).
 */
defined( 'ABSPATH' ) || exit;

$office     = ds_office_data();
$legal      = [];
$privacy    = get_privacy_policy_url();
$disclaimer = get_page_by_path( 'disclaimer' );
if ( $privacy ) {
    $legal[] = [ $privacy, 'Privacy Policy' ];
}
if ( $disclaimer && 'publish' === $disclaimer->post_status ) {
    $legal[] = [ get_permalink( $disclaimer ), 'Disclaimer' ];
}
?>
<!-- wp:html -->
<footer class="ds-footer" id="contact">
  <div class="ds-footer__glow" aria-hidden="true"></div>

  <div class="ds-footer__inner">
    <div class="ds-footer__grid">

      <div>
        <a href="/" class="ds-footer__brand" aria-label="J. Burns DreamSmile — Home">
          <img class="ds-footer__logo-img" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/arrange/jb-logo-clean.png' ); ?>" alt="J. Burns DreamSmile D.D.S. Logo" style="height: 44px; width: auto;" />
        </a>
        <p class="ds-footer__script">DreamSmile<sup class="ds-footer__tm">&trade;</sup></p>
        <p class="ds-footer__tag">A DreamSmile<sup class="ds-tm">&trade;</sup> You&rsquo;ll Never Have to Hide.</p>
      </div>

      <div>
        <h4 class="ds-footer__heading">Contact</h4>
        <div class="ds-footer__links">
          <p>9626 South Congress St<br/>New Market, VA 22844</p>
          <p>Mon&ndash;Thu &middot; 8 AM &ndash; 3 PM</p>
          <p><a href="tel:<?php echo esc_attr( $office['phone_tel'] ); ?>"><?php echo esc_html( $office['phone'] ); ?></a></p>
          <p><a href="/contact/">Visit our contact page &rarr;</a></p>
          <p><a href="/pay-your-bill/">Pay Your Bill Online</a></p>
        </div>
      </div>

      <div>
        <h4 class="ds-footer__heading">Dental Implants</h4>
        <div class="ds-footer__links">
          <p><a href="/dental-implants/">Overview</a></p>
          <p><a href="/implant-cost/">Cost &amp; Financing</a></p>
          <p><a href="/implant-procedures/">Procedures</a></p>
          <p><a href="/implant-faqs/">FAQs</a></p>
          <p><a href="#quiz" data-ds-survey>Am I a Candidate?</a></p>
        </div>
      </div>

      <nav aria-label="Areas we serve">
        <h4 class="ds-footer__heading">Areas We Serve</h4>
        <ul class="ds-footer__links ds-footer__areas">
          <?php foreach ( ds_town_pages() as $town => $path ) : ?>
            <li><a href="<?php echo esc_url( $path ); ?>"><?php echo esc_html( $town ); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <div class="ds-footer__links ds-footer__areas-all"><p><a href="/locations/">All service areas &rarr;</a></p></div>
      </nav>

    </div>

    <div class="ds-footer__bottom">
      <p class="ds-footer__copyright">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Jeffrey S. Burns, DDS. All rights reserved.</p>
      <?php if ( $legal ) : ?>
        <ul class="ds-footer__legal">
          <?php foreach ( $legal as $l ) : ?>
            <li><a href="<?php echo esc_url( $l[0] ); ?>"><?php echo esc_html( $l[1] ); ?></a></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</footer>
<!-- /wp:html -->
