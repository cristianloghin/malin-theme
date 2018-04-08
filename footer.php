</div><!-- CLOSE THE PAGE CONTAINER -->
<footer>
	<div class="container"><!-- container -->
		<div>
			<div>
				<div>
					<span class="small">
						T <?php the_field('footer_phone', 'option'); ?>
					</span>
					<span class="small">
						F <?php the_field('footer_fax', 'option'); ?>
					</span>
					<span class="small">
						<a href="mailto:<?php the_field('footer_email', 'option'); ?>"><?php the_field('footer_email', 'option'); ?></a>
					</span>
					<span class="small">
						<a href="/privacy-statement">Privacy Statement</a>
					</span>
					<span class="small">
						<a href="/cookie-policy">Cookie Policy</a>
					</span>
				</div>
			</div>
			<div>
				<div>
					<span class="small">
						&copy; <?php the_field('footer_copy', 'option'); ?>
					</span>
					<span class="small">
						Site design: <a href="http://www.sourcedesign.ie" target="_blank">Source</a>
					</span>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</div><!-- #container -->
</footer>
<div class="cookie_warning"><!-- cookie_warning -->
	<div class="container">
		<p class="small">
			<?php the_field('cookie_warning_text', 'option'); ?>
			<a href="<?php the_field('cookie_warning_link', 'option'); ?>"><?php the_field('cookie_warning_link_text', 'option'); ?></a>
		</p>
		<a class="button" id="close_cookie_warning">Close</a>
	</div>
</div><!-- #cookie_warning -->
</div><!-- #page wrapper -->
</body>
</html>