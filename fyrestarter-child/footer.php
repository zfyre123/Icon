</main>

<footer class="navy-bg wht-txt">
	<div id="footer-main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer-content d-flex">
						<div class="footer-logo">
							<a href="<?php echo home_url(); ?>" title="<?php echo get_bloginfo( 'name' ); ?>">
			                  <?php echo '<img itemprop="logo" title="State Forty Eight" alt="' . get_bloginfo( 'name' ) . ' Logo" class="footer-logo-img" src="'.get_option('footer_logo_url').'" />';?>
			                </a>
			            </div>
			            <div class="middle-content">
			            	<?php fyre_footer_menu() ?>
			            </div>
		            </div>
		            <a id="page-up"><i class="far fa-chevron-up"></i></a>
			    </div>
			</div>
		</div>
	</div>
	<div id="footer-copy">
		<div class="container">
			<div class="row">
				<div class="col-12">
		            <div class="copy-txt">
		            	<span>&copy; <?php echo date("Y"); ?> <?php bloginfo('name') ?>. All rights reserved. Brand and site design by <a href="https://monomythstudio.com" target="_blank">Monomyth</a>. - <a href="/sitemap_index.xml" target="_blank">Sitemap</a></span>
					</div>
		        </div>
			</div>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>