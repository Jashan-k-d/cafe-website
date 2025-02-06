<?php
/**
 * Theme Page
 *
 * @package Coffee Tea
 */

if ( ! defined( 'COFFEE_TEA_FREE_THEME_URL' ) ) {
	define( 'COFFEE_TEA_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/free-coffee-wordpress-theme' );
}
if ( ! defined( 'COFFEE_TEA_PRO_THEME_URL' ) ) {
	define( 'COFFEE_TEA_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/tea-website-template' );
}
if ( ! defined( 'COFFEE_TEA_FREE_DOC_URL' ) ) {
	define( 'COFFEE_TEA_FREE_DOC_URL', 'https://demo.seothemesexpert.com/documentation/coffee-tea/' );
}
if ( ! defined( 'COFFEE_TEA_DEMO_THEME_URL' ) ) {
	define( 'COFFEE_TEA_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/coffee-tea/' );
}
if ( ! defined( 'COFFEE_TEA_RATE_THEME_URL' ) ) {
    define( 'COFFEE_TEA_RATE_THEME_URL', 'https://wordpress.org/support/theme/coffee-tea/reviews/#new-post' );
}
if ( ! defined( 'COFFEE_TEA_SUPPORT_THEME_URL' ) ) {
    define( 'COFFEE_TEA_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/coffee-tea/' );
}
if ( ! defined( 'COFFEE_TEA_THEME_BUNDLE_URL' ) ) {
    define( 'COFFEE_TEA_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function coffee_tea_menu() {
	add_theme_page( esc_html__( 'About Theme', 'coffee-tea' ), esc_html__( 'About Theme', 'coffee-tea' ), 'edit_theme_options', 'coffee-tea-about', 'coffee_tea_about_display' );
}
add_action( 'admin_menu', 'coffee_tea_menu' );

/**
 * Display About page
 */
function coffee_tea_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'coffee-tea' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'coffee-tea-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'coffee-tea-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'coffee-tea' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'coffee-tea-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'coffee-tea' ); ?></a>
		</nav>

		<?php
			coffee_tea_main_screen();

			coffee_tea_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'coffee-tea' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'coffee-tea' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'coffee-tea' ) : esc_html_e( 'Go to Dashboard', 'coffee-tea' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function coffee_tea_main_screen() {
	if ( isset( $_GET['page'] ) && 'coffee-tea-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'coffee-tea' ) ?><span class="usecode"><?php esc_html_e('" expert20 "', 'coffee-tea'); ?></span></p>
					<p><a target="_blank" href="<?php echo esc_url( COFFEE_TEA_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'coffee-tea' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'coffee-tea' ) ?></p>
					<p><a href="<?php echo esc_url( COFFEE_TEA_FREE_DOC_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'coffee-tea' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Coffee Tea.', 'coffee-tea' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( COFFEE_TEA_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'coffee-tea' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'coffee-tea' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'coffee-tea' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'coffee-tea' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( COFFEE_TEA_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'coffee-tea' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'coffee-tea' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'coffee-tea' ) ?></p>
					<p><a target="_blank" href="<?php echo esc_url( COFFEE_TEA_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'coffee-tea' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $coffee_tea_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $coffee_tea_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'coffee-tea' ); ?>: <?php echo esc_html($coffee_tea_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( COFFEE_TEA_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'coffee-tea' ); ?></a>
						<a href="<?php echo esc_url( COFFEE_TEA_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'coffee-tea' ); ?></a>
						<a href="<?php echo esc_url( COFFEE_TEA_FREE_DOC_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'coffee-tea' ); ?></a>
						<a href="<?php echo esc_url( COFFEE_TEA_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'coffee-tea' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $coffee_tea_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function coffee_tea_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( COFFEE_TEA_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'coffee-tea' ); ?></a>

					<a href="<?php echo esc_url( COFFEE_TEA_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'coffee-tea' ); ?></a>

					<a href="<?php echo esc_url( COFFEE_TEA_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'coffee-tea' ); ?></a>

					<a href="<?php echo esc_url( COFFEE_TEA_FREE_DOC_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'coffee-tea' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'coffee-tea' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'coffee-tea' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'coffee-tea' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'coffee-tea' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'coffee-tea' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(COFFEE_TEA_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'coffee-tea' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}