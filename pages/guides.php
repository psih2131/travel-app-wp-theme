<?php
/**
 * Template Name: Гиды
 * Список гидов: Vue + REST (custom-endpoints/v1/guides, guides-filters).
 */

get_header();

$tpl = get_template_directory_uri();
$config = array(
	'guidesApi'        => esc_url_raw( rest_url( 'custom-endpoints/v1/guides' ) ),
	'guidesFiltersApi' => esc_url_raw( rest_url( 'custom-endpoints/v1/guides-filters' ) ),
	'siteUrl'          => esc_url_raw( home_url( '/' ) ),
	'tplUri'           => esc_url_raw( $tpl ),
);
?>

<main class="main">

	<section class="guides-page-sec">
		<div class="container">
			<div class="bread-crumbs">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bread-crumbs__link">
					Главная
					<svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
							fill="#202020" />
					</svg>
				</a>
				<p class="bread-crumbs__current">Список гидов</p>
			</div>
			<h1 class="tours-hero-sec__title"><?php echo esc_html( get_field( 'zagolovok' ) ); ?></h1>
			<?php
			$sub = get_field( 'podzagolovok' );
			if ( $sub ) :
				?>
			<p class="tours-hero-sec__subtitle"><?php echo esc_html( $sub ); ?></p>
			<?php endif; ?>

			<div id="travel-guides-app"></div>
		</div>
	</section>

</main>

<script>window.travelGuidesPageConfig = <?php echo wp_json_encode( $config ); ?>;</script>
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/vue/GuidesFilters.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/js/guides-page-script.js"></script>

<?php get_footer(); ?>
