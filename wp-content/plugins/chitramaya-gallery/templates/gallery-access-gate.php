<?php
/**
 * Gallery Access Gate Template.
 *
 * @package Chitramaya_Gallery
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$access_type = get_query_var( 'gallery_access_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
	<style>
		body {
			background-color: #0d0d0d;
			color: #e8e0d4;
			font-family: 'Inter', sans-serif;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
		}
		.access-card {
			background: rgba(255, 255, 255, 0.03);
			backdrop-filter: blur(10px);
			border: 1px solid rgba(255, 255, 255, 0.1);
			border-radius: 12px;
			padding: 40px;
			max-width: 400px;
			width: 90%;
			text-align: center;
			box-shadow: 0 20px 40px rgba(0,0,0,0.5);
		}
		.gallery-title {
			color: #c8a97e;
			font-size: 1.8rem;
			font-weight: 300;
			margin: 0 0 20px 0;
		}
		.access-message {
			font-size: 1rem;
			margin-bottom: 30px;
			color: rgba(232, 224, 212, 0.8);
		}
		.access-form input[type="password"] {
			width: 100%;
			padding: 12px 15px;
			margin-bottom: 20px;
			background: rgba(255, 255, 255, 0.05);
			border: 1px solid rgba(255, 255, 255, 0.2);
			color: #fff;
			border-radius: 6px;
			box-sizing: border-box;
			font-family: inherit;
		}
		.access-form input[type="password"]:focus {
			outline: none;
			border-color: #c8a97e;
		}
		.access-form button {
			width: 100%;
			padding: 12px;
			background-color: #c8a97e;
			color: #0d0d0d;
			border: none;
			border-radius: 6px;
			font-size: 1rem;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.3s;
			font-family: inherit;
		}
		.access-form button:hover {
			background-color: #e0c29a;
		}
	</style>
</head>
<body>
	<div class="access-card">
		<h1 class="gallery-title"><?php echo esc_html( get_the_title() ); ?></h1>
		<?php if ( 'password' === $access_type ) : ?>
			<p class="access-message"><?php esc_html_e( 'Please enter the password to view this gallery.', 'chitramaya-gallery' ); ?></p>
			<form class="access-form" method="post" action="">
				<input type="password" name="gallery_password" placeholder="<?php esc_attr_e( 'Password', 'chitramaya-gallery' ); ?>" required>
				<button type="submit"><?php esc_html_e( 'Enter Gallery', 'chitramaya-gallery' ); ?></button>
			</form>
		<?php elseif ( 'magic_link' === $access_type ) : ?>
			<p class="access-message"><?php esc_html_e( 'This gallery requires a private link. Please check your email or contact the photographer.', 'chitramaya-gallery' ); ?></p>
		<?php endif; ?>
	</div>
</body>
</html>
