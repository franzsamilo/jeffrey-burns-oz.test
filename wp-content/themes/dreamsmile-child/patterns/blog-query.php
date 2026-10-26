<?php
/**
 * Title: Blog Post Grid
 * Slug: dreamsmile/blog-query
 * Categories: dreamsmile
 *
 * The post cards on /blog/ and the category/tag archives. It inherits the
 * page's own query, so it lists whatever WordPress would have listed there.
 * Styled in pages.css under "Blog index".
 */
defined( 'ABSPATH' ) || exit;
?>
<!-- wp:query {"queryId":7,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":true},"className":"ds-blog-query","layout":{"type":"default"}} -->
<div class="wp-block-query ds-blog-query">
<!-- wp:post-template {"className":"ds-blog-grid","layout":{"type":"default"}} -->
<!-- wp:group {"className":"ds-blog-card","layout":{"type":"default"}} -->
<div class="wp-block-group ds-blog-card">
<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"ds-blog-card__media"} /-->
<!-- wp:post-date {"className":"ds-blog-card__date"} /-->
<!-- wp:post-title {"level":2,"isLink":true,"className":"ds-blog-card__title"} /-->
<!-- wp:post-excerpt {"excerptLength":26,"className":"ds-blog-card__excerpt"} /-->
<!-- wp:read-more {"content":"Read article","className":"ds-blog-card__more"} /-->
</div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"className":"ds-blog-pagination","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous {"label":"Newer"} /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next {"label":"Older"} /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"className":"ds-blog-empty"} -->
<p class="ds-blog-empty">No articles here yet.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
