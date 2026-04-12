<?php
/**
 * Template Name: user_guide_tour_create
 * Страница «Стать гидом». Доступна только авторизованным.
 */

if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-guide-tours-list' );

if ( ! function_exists( 'travel_user_tour_form_redact_tmp_in_files' ) ) {
	/**
	 * Для отладочного вывода: не показывать реальные пути tmp_name.
	 *
	 * @param mixed $node Узел из $_FILES (вложенные массивы).
	 * @return mixed
	 */
	function travel_user_tour_form_redact_tmp_in_files( $node ) {
		if ( ! is_array( $node ) ) {
			return $node;
		}
		$out = array();
		foreach ( $node as $k => $v ) {
			if ( 'tmp_name' === $k ) {
				if ( is_array( $v ) ) {
					$out[ $k ] = array_map(
						static function ( $p ) {
							return ( is_string( $p ) && '' !== $p ) ? '(временный файл загружен)' : $p;
						},
						$v
					);
				} else {
					$out[ $k ] = ( is_string( $v ) && '' !== $v ) ? '(временный файл загружен)' : $v;
				}
			} elseif ( is_array( $v ) ) {
				$out[ $k ] = travel_user_tour_form_redact_tmp_in_files( $v );
			} else {
				$out[ $k ] = $v;
			}
		}
		return $out;
	}
}

if ( ! function_exists( 'travel_user_tour_normalize_gallery_files' ) ) {
	/**
	 * Приводит $_FILES['tour_gallery'] к списку одиночных массивов файла (один или несколько слотов).
	 *
	 * @param array<string, mixed> $g Узел $_FILES для поля tour_gallery.
	 * @return array<int, array{name: string, type: string, tmp_name: string, error: int, size: int}>
	 */
	function travel_user_tour_normalize_gallery_files( $g ) {
		$out = array();
		if ( ! is_array( $g ) || empty( $g['tmp_name'] ) ) {
			return $out;
		}
		if ( is_array( $g['tmp_name'] ) ) {
			foreach ( $g['tmp_name'] as $i => $tmp ) {
				$row = array(
					'name'     => isset( $g['name'][ $i ] ) ? (string) $g['name'][ $i ] : '',
					'type'     => isset( $g['type'][ $i ] ) ? (string) $g['type'][ $i ] : '',
					'tmp_name' => (string) $tmp,
					'error'    => isset( $g['error'][ $i ] ) ? (int) $g['error'][ $i ] : UPLOAD_ERR_NO_FILE,
					'size'     => isset( $g['size'][ $i ] ) ? (int) $g['size'][ $i ] : 0,
				);
				if ( isset( $g['full_path'][ $i ] ) ) {
					$row['full_path'] = (string) $g['full_path'][ $i ];
				}
				$out[] = $row;
			}
			return $out;
		}
		$row = array(
			'name'     => isset( $g['name'] ) ? (string) $g['name'] : '',
			'type'     => isset( $g['type'] ) ? (string) $g['type'] : '',
			'tmp_name' => (string) $g['tmp_name'],
			'error'    => isset( $g['error'] ) ? (int) $g['error'] : UPLOAD_ERR_NO_FILE,
			'size'     => isset( $g['size'] ) ? (int) $g['size'] : 0,
		);
		if ( isset( $g['full_path'] ) && is_string( $g['full_path'] ) ) {
			$row['full_path'] = $g['full_path'];
		}
		$out[] = $row;
		return $out;
	}
}

$travel_form_submitted_dump = null;
if ( 'POST' === ( $_SERVER['REQUEST_METHOD'] ?? '' ) && isset( $_POST['travel_form_dump_test'] ) ) {
	$post_for_dump = wp_unslash( $_POST );
	unset( $post_for_dump['travel_form_dump_test'] );
	$travel_form_submitted_dump = array(
		'post'  => $post_for_dump,
		'files' => ! empty( $_FILES ) ? travel_user_tour_form_redact_tmp_in_files( $_FILES ) : array(),
	);
}


$user_guide_tours_url = home_url( '/user-guide-tours/' );
$status_post_create = '';

$travel_tour_terms_direction = get_terms(
	array(
		'taxonomy'   => 'direction',
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);
if ( is_wp_error( $travel_tour_terms_direction ) ) {
	$travel_tour_terms_direction = array();
}

$travel_tour_terms_rubric = get_terms(
	array(
		'taxonomy'   => 'tour-rubric',
		'hide_empty' => false,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);
if ( is_wp_error( $travel_tour_terms_rubric ) ) {
	$travel_tour_terms_rubric = array();
}

if ( 'POST' === ( $_SERVER['REQUEST_METHOD'] ?? '' ) && isset( $_POST['travel_form_dump_test'], $_POST['tour_title'] ) ) {
	$post_id = wp_insert_post(
		array(
			'post_title'  => sanitize_text_field( wp_unslash( $_POST['tour_title'] ) ),
			'post_status' => 'pending',
			'post_type'   => 'tours',
			'post_author' => get_current_user_id(),
		),
		true
	);
	if ( ! is_wp_error( $post_id ) && $post_id > 0 ) {
		$status_post_create = $post_id;
		$p                  = wp_unslash( $_POST );

		$travel_tax_direction_ids = array();
		if ( ! empty( $p['tax_direction'] ) && is_array( $p['tax_direction'] ) ) {
			foreach ( $p['tax_direction'] as $tid_raw ) {
				$tid = absint( $tid_raw );
				if ( ! $tid ) {
					continue;
				}
				$term = get_term( $tid, 'direction' );
				if ( $term && ! is_wp_error( $term ) ) {
					$travel_tax_direction_ids[] = $tid;
				}
			}
			$travel_tax_direction_ids = array_values( array_unique( $travel_tax_direction_ids ) );
		}
		wp_set_object_terms( $post_id, $travel_tax_direction_ids, 'direction' );

		$travel_tax_rubric_ids = array();
		if ( ! empty( $p['tax_tour_rubric'] ) && is_array( $p['tax_tour_rubric'] ) ) {
			foreach ( $p['tax_tour_rubric'] as $tid_raw ) {
				$tid = absint( $tid_raw );
				if ( ! $tid ) {
					continue;
				}
				$term = get_term( $tid, 'tour-rubric' );
				if ( $term && ! is_wp_error( $term ) ) {
					$travel_tax_rubric_ids[] = $tid;
				}
			}
			$travel_tax_rubric_ids = array_values( array_unique( $travel_tax_rubric_ids ) );
		}
		wp_set_object_terms( $post_id, $travel_tax_rubric_ids, 'tour-rubric' );

		if ( function_exists( 'update_field' ) ) {
			update_field( 'prodolzhitelnost_tura', sanitize_text_field( $p['tour_duration'] ?? '' ), $post_id );
			update_field( 'korotkoe_opisanie_kartochki', sanitize_textarea_field( $p['tour_short_description'] ?? '' ), $post_id );
			update_field( 'osnovnaya_czena', sanitize_text_field( $p['stoimost_tura'] ?? '' ), $post_id );

			// ACF «Количество людей» (radio): значения формы → ключи choices в ACF.
			$travel_group_size_map = array(
				'1'       => '1',
				'3_5'     => '3 – 5',
				'5_10'    => '5 – 10',
				'10_15'   => '10 – 15',
				'15_20'   => '15 – 20',
				'over_20' => '>20',
			);
			$travel_group_size_raw = isset( $p['tour_group_size'] ) ? sanitize_text_field( $p['tour_group_size'] ) : '';
			if ( $travel_group_size_raw !== '' && isset( $travel_group_size_map[ $travel_group_size_raw ] ) ) {
				update_field( 'field_69db2c5fa6ccc', $travel_group_size_map[ $travel_group_size_raw ], $post_id );
			}

			// ACF «Тип цены» (radio): tour_price_basis → ключи choices в ACF.
			$travel_price_basis_map = array(
				'group'  => 'Цена за группу',
				'person' => 'Цена за человека',
			);
			$travel_price_basis_raw = isset( $p['tour_price_basis'] ) ? sanitize_text_field( $p['tour_price_basis'] ) : '';
			$travel_tip_czeny       = isset( $travel_price_basis_map[ $travel_price_basis_raw ] )
				? $travel_price_basis_map[ $travel_price_basis_raw ]
				: $travel_price_basis_map['person'];
			update_field( 'field_69db2be5af738', $travel_tip_czeny, $post_id );

			update_field(
				'field_69b035c6e6cbe',
				sanitize_textarea_field( $p['tour_what_awaits'] ?? '' ),
				$post_id
			);
			update_field(
				'field_69b0364abb0a8',
				array(
					'pitanie'             => sanitize_textarea_field( $p['tour_org_nutrition'] ?? '' ),
					'transport'           => sanitize_textarea_field( $p['tour_org_transport'] ?? '' ),
					'vozrast_uchastnikov' => sanitize_textarea_field( $p['tour_org_age'] ?? '' ),
					'viza'                => sanitize_textarea_field( $p['tour_org_visa'] ?? '' ),
					'uroven_slozhnosti'   => sanitize_textarea_field( $p['tour_org_difficulty'] ?? '' ),
				),
				$post_id
			);

			if ( ! empty( $_FILES['tour_background_image']['name'] ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
				require_once ABSPATH . 'wp-admin/includes/media.php';
				require_once ABSPATH . 'wp-admin/includes/image.php';
				$aid = media_handle_upload( 'tour_background_image', $post_id );
				if ( ! is_wp_error( $aid ) ) {
					update_field( 'fonovoe_izobrazhenie', $aid, $post_id );
					set_post_thumbnail( $post_id, $aid );
				}
			}

			// ACF «Галерея изображений»: ключи из JSON группы; min 5 строк — дополняем пустыми рядами после загрузок.
			$acf_gallery_repeater = 'field_69b0311ffea45';
			$acf_gallery_image    = 'field_69b0312bfea46';
			$acf_gallery_caption  = 'field_69b034fc782d3';
			$acf_gallery_min_rows = 5;

			$gallery_rows = array();
			if ( ! empty( $_FILES['tour_gallery'] ) && ! empty( $_FILES['tour_gallery']['tmp_name'] ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
				require_once ABSPATH . 'wp-admin/includes/image.php';

				foreach ( travel_user_tour_normalize_gallery_files( $_FILES['tour_gallery'] ) as $file ) {
					if ( '' === $file['tmp_name'] || UPLOAD_ERR_OK !== $file['error'] ) {
						continue;
					}
					$uploaded = wp_handle_upload( $file, array( 'test_form' => false ) );
					if ( isset( $uploaded['error'] ) ) {
						continue;
					}
					$attach_id = wp_insert_attachment(
						array(
							'post_mime_type' => $uploaded['type'],
							'post_title'     => sanitize_file_name( pathinfo( $uploaded['file'], PATHINFO_FILENAME ) ),
							'post_content'   => '',
							'post_status'    => 'inherit',
						),
						$uploaded['file'],
						$post_id,
						true
					);
					if ( is_wp_error( $attach_id ) || ! $attach_id ) {
						if ( ! empty( $uploaded['file'] ) && is_string( $uploaded['file'] ) && file_exists( $uploaded['file'] ) ) {
							wp_delete_file( $uploaded['file'] );
						}
						continue;
					}
					$meta = wp_generate_attachment_metadata( $attach_id, $uploaded['file'] );
					wp_update_attachment_metadata( $attach_id, $meta );
					$gallery_rows[] = array(
						$acf_gallery_image   => (int) $attach_id,
						$acf_gallery_caption => '',
					);
				}
			}
			if ( $gallery_rows ) {
				while ( count( $gallery_rows ) < $acf_gallery_min_rows ) {
					$gallery_rows[] = array(
						$acf_gallery_image   => '',
						$acf_gallery_caption => '',
					);
				}
				update_field( $acf_gallery_repeater, $gallery_rows, $post_id );
			}

			// ACF «Проживание»: repeater prozhivanie; в форме — tour_accommodation[i][description], файлы [...][izobrazheniya_mesta_prozhivaniya][].
			$acf_acc_rep      = 'field_69b03837a9322';
			$acf_acc_wysiwyg  = 'field_69b0383fa9323';
			$acf_acc_gal_rep  = 'field_69b0385ba9324';
			$acf_acc_img      = 'field_69b03870a9325';
			$acf_acc_max_imgs = 10;

			$acc_post = isset( $p['tour_accommodation'] ) && is_array( $p['tour_accommodation'] ) ? $p['tour_accommodation'] : array();
			$acc_files = isset( $_FILES['tour_accommodation'] ) && is_array( $_FILES['tour_accommodation'] ) ? $_FILES['tour_accommodation'] : array();
			$acc_rows  = array();

			if ( $acc_post ) {
				if ( ! function_exists( 'wp_handle_upload' ) ) {
					require_once ABSPATH . 'wp-admin/includes/file.php';
				}
				if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
					require_once ABSPATH . 'wp-admin/includes/image.php';
				}

				$acc_keys = array_keys( $acc_post );
				sort( $acc_keys, SORT_NATURAL );

				foreach ( $acc_keys as $i ) {
					$row = $acc_post[ $i ];
					if ( ! is_array( $row ) ) {
						continue;
					}
					$desc = isset( $row['description'] ) ? wp_kses_post( $row['description'] ) : '';

					$nested_images = array();
					if ( ! empty( $acc_files['tmp_name'][ $i ]['izobrazheniya_mesta_prozhivaniya'] ) ) {
						$slice = array(
							'name'     => $acc_files['name'][ $i ]['izobrazheniya_mesta_prozhivaniya'],
							'type'     => $acc_files['type'][ $i ]['izobrazheniya_mesta_prozhivaniya'],
							'tmp_name' => $acc_files['tmp_name'][ $i ]['izobrazheniya_mesta_prozhivaniya'],
							'error'    => $acc_files['error'][ $i ]['izobrazheniya_mesta_prozhivaniya'],
							'size'     => $acc_files['size'][ $i ]['izobrazheniya_mesta_prozhivaniya'],
						);
						if ( isset( $acc_files['full_path'][ $i ]['izobrazheniya_mesta_prozhivaniya'] ) ) {
							$slice['full_path'] = $acc_files['full_path'][ $i ]['izobrazheniya_mesta_prozhivaniya'];
						}
						$n = 0;
						foreach ( travel_user_tour_normalize_gallery_files( $slice ) as $file ) {
							if ( $n >= $acf_acc_max_imgs ) {
								break;
							}
							if ( '' === $file['tmp_name'] || UPLOAD_ERR_OK !== $file['error'] ) {
								continue;
							}
							$uploaded = wp_handle_upload( $file, array( 'test_form' => false ) );
							if ( isset( $uploaded['error'] ) ) {
								continue;
							}
							$attach_id = wp_insert_attachment(
								array(
									'post_mime_type' => $uploaded['type'],
									'post_title'     => sanitize_file_name( pathinfo( $uploaded['file'], PATHINFO_FILENAME ) ),
									'post_content'   => '',
									'post_status'    => 'inherit',
								),
								$uploaded['file'],
								$post_id,
								true
							);
							if ( is_wp_error( $attach_id ) || ! $attach_id ) {
								if ( ! empty( $uploaded['file'] ) && is_string( $uploaded['file'] ) && file_exists( $uploaded['file'] ) ) {
									wp_delete_file( $uploaded['file'] );
								}
								continue;
							}
							$meta = wp_generate_attachment_metadata( $attach_id, $uploaded['file'] );
							wp_update_attachment_metadata( $attach_id, $meta );
							$nested_images[] = array(
								$acf_acc_img => (int) $attach_id,
							);
							++$n;
						}
					}

					$desc_plain = trim( wp_strip_all_tags( $desc ) );
					if ( '' === $desc_plain && empty( $nested_images ) ) {
						continue;
					}

					$acc_rows[] = array(
						$acf_acc_wysiwyg => $desc,
						$acf_acc_gal_rep => $nested_images,
					);
				}
			}

			if ( $acc_rows ) {
				update_field( $acf_acc_rep, $acc_rows, $post_id );
			}

			// ACF «Программа» (group programma): tour_program_nachalo / tour_program_finish, tour_program_stages[i][...], файлы [i][gallery][].
			$acf_prog_group    = 'field_69b03a4df19ed';
			$acf_prog_nachalo  = 'field_69b03a65f19ee';
			$acf_prog_finish   = 'field_69b03a74f19ef';
			$acf_prog_etapy    = 'field_69b03a79f19f0';
			$acf_stage_title   = 'field_69b03ab2f19f1';
			$acf_stage_days    = 'field_69b03ad0f19f2';
			$acf_day_zag       = 'field_69b03ad9f19f3';
			$acf_day_opis      = 'field_69b03ae6f19f4';
			$acf_stage_gallery = 'field_69b03af7f19f5';
			$acf_st_gal_img    = 'field_69b03b06f19f6';
			$acf_st_gal_cap    = 'field_69b03c014a347';
			$acf_st_gal_max    = 10;

			$prog_nachalo = sanitize_text_field( $p['tour_program_nachalo'] ?? '' );
			$prog_finish  = sanitize_text_field( $p['tour_program_finish'] ?? '' );

			$stages_post  = isset( $p['tour_program_stages'] ) && is_array( $p['tour_program_stages'] ) ? $p['tour_program_stages'] : array();
			$stages_files = isset( $_FILES['tour_program_stages'] ) && is_array( $_FILES['tour_program_stages'] ) ? $_FILES['tour_program_stages'] : array();
			$etapy_rows   = array();

			if ( $stages_post || $prog_nachalo !== '' || $prog_finish !== '' ) {
				if ( ! function_exists( 'wp_handle_upload' ) ) {
					require_once ABSPATH . 'wp-admin/includes/file.php';
				}
				if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
					require_once ABSPATH . 'wp-admin/includes/image.php';
				}
			}

			$stage_keys = array_keys( $stages_post );
			sort( $stage_keys, SORT_NATURAL );

			foreach ( $stage_keys as $i ) {
				$row = $stages_post[ $i ];
				if ( ! is_array( $row ) ) {
					continue;
				}

				$title = sanitize_text_field( $row['nazvanie_etapa'] ?? '' );

				$day_rows = array();
				if ( ! empty( $row['day_steps'] ) && is_array( $row['day_steps'] ) ) {
					$day_keys = array_keys( $row['day_steps'] );
					sort( $day_keys, SORT_NATURAL );
					foreach ( $day_keys as $j ) {
						$step = $row['day_steps'][ $j ];
						if ( ! is_array( $step ) ) {
							continue;
						}
						$zh = sanitize_text_field( $step['heading'] ?? '' );
						$op = sanitize_textarea_field( $step['description'] ?? '' );
						if ( '' === trim( $zh ) && '' === trim( $op ) ) {
							continue;
						}
						$day_rows[] = array(
							$acf_day_zag  => $zh,
							$acf_day_opis => $op,
						);
					}
				}

				$gal_rows = array();
				if ( ! empty( $stages_files['tmp_name'][ $i ]['gallery'] ) ) {
					$slice = array(
						'name'     => $stages_files['name'][ $i ]['gallery'],
						'type'     => $stages_files['type'][ $i ]['gallery'],
						'tmp_name' => $stages_files['tmp_name'][ $i ]['gallery'],
						'error'    => $stages_files['error'][ $i ]['gallery'],
						'size'     => $stages_files['size'][ $i ]['gallery'],
					);
					if ( isset( $stages_files['full_path'][ $i ]['gallery'] ) ) {
						$slice['full_path'] = $stages_files['full_path'][ $i ]['gallery'];
					}
					$gn = 0;
					foreach ( travel_user_tour_normalize_gallery_files( $slice ) as $file ) {
						if ( $gn >= $acf_st_gal_max ) {
							break;
						}
						if ( '' === $file['tmp_name'] || UPLOAD_ERR_OK !== $file['error'] ) {
							continue;
						}
						$uploaded = wp_handle_upload( $file, array( 'test_form' => false ) );
						if ( isset( $uploaded['error'] ) ) {
							continue;
						}
						$attach_id = wp_insert_attachment(
							array(
								'post_mime_type' => $uploaded['type'],
								'post_title'     => sanitize_file_name( pathinfo( $uploaded['file'], PATHINFO_FILENAME ) ),
								'post_content'   => '',
								'post_status'    => 'inherit',
							),
							$uploaded['file'],
							$post_id,
							true
						);
						if ( is_wp_error( $attach_id ) || ! $attach_id ) {
							if ( ! empty( $uploaded['file'] ) && is_string( $uploaded['file'] ) && file_exists( $uploaded['file'] ) ) {
								wp_delete_file( $uploaded['file'] );
							}
							continue;
						}
						$meta = wp_generate_attachment_metadata( $attach_id, $uploaded['file'] );
						wp_update_attachment_metadata( $attach_id, $meta );
						$gal_rows[] = array(
							$acf_st_gal_img => (int) $attach_id,
							$acf_st_gal_cap => '',
						);
						++$gn;
					}
				}

				if ( '' === trim( $title ) && empty( $day_rows ) && empty( $gal_rows ) ) {
					continue;
				}

				$etapy_rows[] = array(
					$acf_stage_title   => $title,
					$acf_stage_days    => $day_rows,
					$acf_stage_gallery => $gal_rows,
				);
			}

			update_field(
				$acf_prog_group,
				array(
					$acf_prog_nachalo => $prog_nachalo,
					$acf_prog_finish  => $prog_finish,
					$acf_prog_etapy   => $etapy_rows,
				),
				$post_id
			);

			update_field(
				'field_69b041cfef4fe',
				wp_kses_post( $p['tour_useful_info'] ?? '' ),
				$post_id
			);

			$price_include_rows = array();
			if ( ! empty( $p['tour_price_includes'] ) && is_array( $p['tour_price_includes'] ) ) {
				foreach ( $p['tour_price_includes'] as $item ) {
					$txt = sanitize_text_field( $item );
					if ( '' === $txt ) {
						continue;
					}
					$price_include_rows[] = array( 'field_69b04202ef500' => $txt );
				}
			}
			update_field( 'field_69b041f5ef4ff', $price_include_rows, $post_id );

			$price_exclude_rows = array();
			if ( ! empty( $p['chto_ne_vhodit_v_stoimost'] ) && is_array( $p['chto_ne_vhodit_v_stoimost'] ) ) {
				foreach ( $p['chto_ne_vhodit_v_stoimost'] as $item ) {
					$txt = sanitize_text_field( $item );
					if ( '' === $txt ) {
						continue;
					}
					$price_exclude_rows[] = array( 'field_69b04215ef502' => $txt );
				}
			}
			update_field( 'field_69b04207ef501', $price_exclude_rows, $post_id );
		}
	}
}
?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">
                

                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                <div class="user-account__user-tour-create">
                    <h1 class="user-tour-create__title">Создание тура</h1>
             

                    <?php if ( is_array( $travel_form_submitted_dump ) ) : ?>
                        <div class="user-tour-create-form__debug" style="margin-bottom:1.5rem;padding:1rem;background:#f5f5f5;border:1px solid #ccc;border-radius:6px;overflow:auto;max-height:70vh">
                            <p style="margin:0 0 .5rem"><strong>Тест: что пришло с формы</strong></p>
                            <p style="margin:0 0 .35rem;font-size:.875rem;color:#555">POST (<code>$_POST</code>)</p>
                            <pre style="margin:0 0 1rem;font-size:12px;white-space:pre-wrap;word-break:break-word"><?php echo esc_html( print_r( $travel_form_submitted_dump['post'], true ) ); ?></pre>
                            <p style="margin:0 0 .35rem;font-size:.875rem;color:#555">FILES (<code>$_FILES</code>, пути tmp скрыты)</p>
                            <pre style="margin:0;font-size:12px;white-space:pre-wrap;word-break:break-word"><?php echo esc_html( print_r( $travel_form_submitted_dump['files'], true ) ); ?></pre>
                        </div>
                    <?php endif; ?>
                        
                    <?php if ( ! $status_post_create ) : ?>
                    <form class="user-tour-create-form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="travel_form_dump_test" value="1" />
                        <div class="user-tour-create-form__section">
                            <h2 class="user-tour-create-form__section-title">Основное</h2>
                            <div class="user-tour-create-form__grid">
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-title">Название тура</label>
                                    <input class="user-tour-create-form__input" id="tour-title" name="tour_title" type="text" autocomplete="off" required />
                                </div>

								<div class="user-tour-create-form__field user-tour-create-form__field--full user-tour-create-taxonomy js-tour-taxonomy" data-taxonomy="direction">
                                    <span class="user-tour-create-form__label">Направления тура</span>
                                    <p class="user-tour-create-form__hint user-tour-create-form__hint--taxonomy">Можно выбрать несколько направлений из списка ниже.</p>
                                    <label class="user-tour-create-taxonomy__search-label" for="tour-tax-direction-search">Поиск по направлениям</label>
                                    <input
                                        class="user-tour-create-form__input user-tour-create-taxonomy__search js-tour-taxonomy-search"
                                        id="tour-tax-direction-search"
                                        type="search"
                                        autocomplete="off"
                                        placeholder="Начните вводить название…"
                                    />
                                    <div class="user-tour-create-taxonomy__scroll">
                                        <div class="user-tour-create-taxonomy__list js-tour-taxonomy-list" role="group" aria-label="Направления">
											<?php if ( empty( $travel_tour_terms_direction ) ) : ?>
												<p class="user-tour-create-form__hint">Нет терминов в таксономии «Направления». Добавьте их в админке WordPress.</p>
											<?php else : ?>
												<?php foreach ( $travel_tour_terms_direction as $travel_term ) : ?>
													<?php
													if ( ! $travel_term instanceof WP_Term ) {
														continue;
													}
													$travel_dir_indent = $travel_term->parent ? '— ' : '';
													?>
													<label class="user-tour-create-taxonomy__item js-tour-taxonomy-item">
														<input type="checkbox" name="tax_direction[]" value="<?php echo esc_attr( (string) $travel_term->term_id ); ?>" />
														<span class="user-tour-create-taxonomy__item-text"><?php echo esc_html( $travel_dir_indent . $travel_term->name ); ?></span>
													</label>
												<?php endforeach; ?>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="user-tour-create-form__field user-tour-create-form__field--full user-tour-create-taxonomy js-tour-taxonomy" data-taxonomy="tour-rubric">
                                    <span class="user-tour-create-form__label">Рубрики туров</span>
                                    <p class="user-tour-create-form__hint user-tour-create-form__hint--taxonomy">Можно выбрать несколько рубрик из списка ниже.</p>
                                    <label class="user-tour-create-taxonomy__search-label" for="tour-tax-rubric-search">Поиск по рубрикам</label>
                                    <input
                                        class="user-tour-create-form__input user-tour-create-taxonomy__search js-tour-taxonomy-search"
                                        id="tour-tax-rubric-search"
                                        type="search"
                                        autocomplete="off"
                                        placeholder="Начните вводить название…"
                                    />
                                    <div class="user-tour-create-taxonomy__scroll">
                                        <div class="user-tour-create-taxonomy__list js-tour-taxonomy-list" role="group" aria-label="Рубрики туров">
											<?php if ( empty( $travel_tour_terms_rubric ) ) : ?>
												<p class="user-tour-create-form__hint">Нет терминов в таксономии «Рубрики туров». Добавьте их в админке WordPress.</p>
											<?php else : ?>
												<?php foreach ( $travel_tour_terms_rubric as $travel_term ) : ?>
													<?php
													if ( ! $travel_term instanceof WP_Term ) {
														continue;
													}
													$travel_rub_indent = $travel_term->parent ? '— ' : '';
													?>
													<label class="user-tour-create-taxonomy__item js-tour-taxonomy-item">
														<input type="checkbox" name="tax_tour_rubric[]" value="<?php echo esc_attr( (string) $travel_term->term_id ); ?>" />
														<span class="user-tour-create-taxonomy__item-text"><?php echo esc_html( $travel_rub_indent . $travel_term->name ); ?></span>
													</label>
												<?php endforeach; ?>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <span class="user-tour-create-form__label" id="tour-group-size-label">Размер группы</span>
                                    <div class="user-tour-create-group-size" role="radiogroup" aria-labelledby="tour-group-size-label">
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="1" />
                                            <span class="user-tour-create-group-size__text">1</span>
                                        </label>
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="3_5" />
                                            <span class="user-tour-create-group-size__text">3&nbsp;–&nbsp;5</span>
                                        </label>
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="5_10" />
                                            <span class="user-tour-create-group-size__text">5&nbsp;–&nbsp;10</span>
                                        </label>
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="10_15" />
                                            <span class="user-tour-create-group-size__text">10&nbsp;–&nbsp;15</span>
                                        </label>
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="15_20" />
                                            <span class="user-tour-create-group-size__text">15&nbsp;–&nbsp;20</span>
                                        </label>
                                        <label class="user-tour-create-group-size__option">
                                            <input type="radio" name="tour_group_size" value="over_20" />
                                            <span class="user-tour-create-group-size__text">&gt;20</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <span class="user-tour-create-form__label">Фоновое изображение</span>
                                    <p class="user-tour-create-form__formats">JPG, PNG или WebP</p>
                                    <label class="user-tour-create-form__file">
                                        <input class="user-tour-create-form__file-input js-tour-bg-image" required name="tour_background_image" type="file" accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp" />
                                        <span class="user-tour-create-form__file-text">Выберите файл</span>
                                    </label>
                                    <div class="user-tour-create-form__preview-single js-tour-bg-preview" aria-live="polite"></div>
                                    <p class="user-tour-create-form__file-error js-tour-bg-error" role="alert" hidden></p>
                                </div>
                                <div class="user-tour-create-form__field">
                                    <label class="user-tour-create-form__label" for="tour-duration">Продолжительность тура</label>
                                    <input class="user-tour-create-form__input" id="tour-duration" required name="tour_duration" type="text" placeholder="Например: 7 дней / 6 ночей" autocomplete="off" />
                                </div>
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-short-desc">Короткое описание тура</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-short-desc" name="tour_short_description" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
    
                        <div class="user-tour-create-form__section">
                            <h2 class="user-tour-create-form__section-title">Галерея тура</h2>
                            <p class="user-tour-create-form__hint">Можно выбрать несколько изображений. Форматы: JPG, PNG, WebP.</p>
                            <label class="user-tour-create-form__file user-tour-create-form__file--wide">
                                <input class="user-tour-create-form__file-input js-tour-gallery-input" name="tour_gallery[]" type="file" accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp" multiple />
                                <span class="user-tour-create-form__file-text">Добавить фото в галерею</span>
                            </label>
                            <div class="user-tour-create-form__preview-grid js-tour-gallery-previews" aria-live="polite"></div>
                            <p class="user-tour-create-form__file-error js-tour-gallery-error" role="alert" hidden></p>
                        </div>
    
                        <div class="user-tour-create-form__section">
                            <h2 class="user-tour-create-form__section-title">Что вас ждёт</h2>
                            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                <label class="user-tour-create-form__label" for="tour-what-awaits">Описание</label>
                                <textarea class="user-tour-create-form__textarea" required id="tour-what-awaits" name="tour_what_awaits" rows="5"></textarea>
                            </div>
                        </div>
    
                        <div class="user-tour-create-form__section">
                            <h2 class="user-tour-create-form__section-title">Организационные детали</h2>
                            <div class="user-tour-create-form__grid">
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-org-food">Питание</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-org-food" name="tour_org_nutrition" rows="3"></textarea>
                                </div>
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-org-transport">Транспорт</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-org-transport" name="tour_org_transport" rows="3"></textarea>
                                </div>
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-org-age">Возраст участников</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-org-age" name="tour_org_age" rows="3"></textarea>
                                </div>
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-org-visa">Виза</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-org-visa" name="tour_org_visa" rows="3"></textarea>
                                </div>
                                <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                    <label class="user-tour-create-form__label" for="tour-org-difficulty">Уровень сложности</label>
                                    <textarea class="user-tour-create-form__textarea" required id="tour-org-difficulty" name="tour_org_difficulty" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
    
                        <div class="user-tour-create-form__section user-tour-create-form__section--accommodation">
                            <div class="user-tour-create-form__section-head">
                                <h2 class="user-tour-create-form__section-title">Проживание</h2>
                                <button type="button" class="user-tour-create-form__add-btn js-tour-add-accommodation">
                                    Добавить место проживания
                                </button>
                            </div>
                            <p class="user-tour-create-form__hint">Описание — как в редакторе WordPress (WYSIWYG). Галерея — изображения места (<code>izobrazheniya_mesta_prozhivaniya</code>).</p>
    
                            <div class="user-tour-create-accommodation-list js-tour-accommodation-list"></div>
                        </div>
    
                        <div class="user-tour-create-form__section user-tour-create-form__section--program">
                            <h2 class="user-tour-create-form__section-title">Программа</h2>
                            <div class="user-tour-create-form__grid">
                                <div class="user-tour-create-form__field">
                                    <label class="user-tour-create-form__label" for="tour-program-nachalo">Начало</label>
                                    <input class="user-tour-create-form__input" id="tour-program-nachalo" name="tour_program_nachalo" type="text" autocomplete="off" placeholder="Например: День 1, 09:00" />
                                </div>
                                <div class="user-tour-create-form__field">
                                    <label class="user-tour-create-form__label" for="tour-program-finish">Финиш</label>
                                    <input class="user-tour-create-form__input" id="tour-program-finish" name="tour_program_finish" type="text" autocomplete="off" placeholder="Например: День 7, 18:00" />
                                </div>
                            </div>
    
                            <div class="user-tour-create-form__section-head user-tour-create-form__section-head--program-stages">
                                <h3 class="user-tour-create-form__subsection-title">Этапы тура</h3>
                                <button type="button" class="user-tour-create-form__add-btn js-tour-add-program-stage">
                                    Добавить этап
                                </button>
                            </div>
                            <p class="user-tour-create-form__hint">Для каждого этапа укажите название, блоки внутри дня и при необходимости галерею. Форматы фото: JPG, PNG, WebP.</p>
    
                            <div class="user-tour-create-program-stages js-tour-program-stages-list"></div>
                        </div>
    
                        <div class="user-tour-create-form__section user-tour-create-form__section--useful-info">
                            <h2 class="user-tour-create-form__section-title">Полезная информация</h2>
                            <p class="user-tour-create-form__hint">Текст как в редакторе WordPress (WYSIWYG).</p>
                            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                <span class="user-tour-create-form__label">Содержание</span>
                                <div class="user-tour-create-form__editor-wrap">
                                    <div class="user-tour-create-form__quill js-tour-useful-info-quill"></div>
                                    <input type="hidden" class="js-tour-useful-info-value" name="tour_useful_info" value="" />
                                </div>
                            </div>
                        </div>
    
                        <div class="user-tour-create-form__section user-tour-create-form__section--price-includes">
                            <div class="user-tour-create-form__section-head user-tour-create-form__section-head--price-includes">
                                <h2 class="user-tour-create-form__section-title">Что входит в стоимость</h2>
                                <button type="button" class="user-tour-create-form__add-btn js-tour-add-price-include">Добавить</button>
                            </div>
                            <p class="user-tour-create-form__hint">Каждый пункт — отдельная строка. Можно добавить несколько.</p>
                            <div class="user-tour-create-price-includes js-tour-price-includes-list"></div>
                        </div>
    
                        <div class="user-tour-create-form__section user-tour-create-form__section--price-excludes">
                            <div class="user-tour-create-form__section-head user-tour-create-form__section-head--price-excludes">
                                <h2 class="user-tour-create-form__section-title">Что не входит в стоимость</h2>
                                <button type="button" class="user-tour-create-form__add-btn js-tour-add-price-exclude">Добавить</button>
                            </div>
                            <p class="user-tour-create-form__hint">Каждый пункт — отдельная строка. Можно добавить несколько.</p>
                            <div class="user-tour-create-price-excludes js-tour-price-excludes-list"></div>
                        </div>
    

						<div class="user-tour-create-form__section user-tour-create-form__section--tour-cost">
                            <div class="user-tour-create-tour-cost">
                                <h2 class="user-tour-create-tour-cost__title">Стоимость</h2>
                                <div class="user-tour-create-tour-cost__fields">
                                    <div class="user-tour-create-tour-cost__basis">
                                        <span class="user-tour-create-form__label" id="tour-price-basis-label">Тип цены</span>
                                        <div class="user-tour-create-tour-cost__segment" role="radiogroup" aria-labelledby="tour-price-basis-label">
                                            <label class="user-tour-create-tour-cost__segment-btn">
                                                <input type="radio" name="tour_price_basis" value="group" />
                                                <span class="user-tour-create-tour-cost__segment-text">Цена за группу</span>
                                            </label>
                                            <label class="user-tour-create-tour-cost__segment-btn">
                                                <input type="radio" name="tour_price_basis" value="person" checked />
                                                <span class="user-tour-create-tour-cost__segment-text">Цена за человека</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="user-tour-create-form__field user-tour-create-form__field--full">
                                        <label class="user-tour-create-form__label" for="tour-stoimost-tura">Стоимость тура</label>
                                        <input
										    class="user-tour-create-form__input"
                                            id="tour-stoimost-tura"
                                            name="stoimost_tura"
                                            type="text"
                                            autocomplete="off"
                                            required
                                            placeholder="Например: от 1 200 €"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>

						
    
                        <div class="user-tour-create-form__actions">
                            <button type="submit" class="user-tour-create-form__submit">Сохранить черновик</button>
                        </div>
                    </form>

                    <?php else : ?>
                    <div class="user-tour-create-form__success">
                        <p>Ваш тур создан и находится в статусе модерации</p>
                        <p>Вы можете увидеть список своих туров в разделе «Мои туры»</p>
                        <a href="<?php echo esc_url( $user_guide_tours_url ); ?>" class="user-tour-create-form__link">Мои туры</a>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <template id="tour-price-include-row-template">
        <div class="user-tour-create-price-include-row js-tour-price-include-row">
            <input
                class="user-tour-create-form__input user-tour-create-price-include-row__input js-tour-price-include-input"
                type="text"
                name="tour_price_includes[0]"
                autocomplete="off"
                placeholder="Например: трансфер из аэропорта"
            />
            <button type="button" class="user-tour-create-price-include-row__remove js-tour-price-include-remove" aria-label="Удалить пункт">Удалить</button>
        </div>
    </template>
    
    <template id="tour-price-exclude-row-template">
        <div class="user-tour-create-price-exclude-row js-tour-price-exclude-row">
            <input
                class="user-tour-create-form__input user-tour-create-price-exclude-row__input js-tour-price-exclude-input"
                type="text"
                name="chto_ne_vhodit_v_stoimost[0]"
                autocomplete="off"
                placeholder="Например: авиабилеты до места старта"
            />
            <button type="button" class="user-tour-create-price-exclude-row__remove js-tour-price-exclude-remove" aria-label="Удалить пункт">Удалить</button>
        </div>
    </template>
    
    <template id="tour-accommodation-row-template">
        <div class="user-tour-create-accommodation js-tour-accommodation-row">
            <div class="user-tour-create-accommodation__head">
                <h3 class="user-tour-create-accommodation__title">Место проживания</h3>
                <button type="button" class="user-tour-create-accommodation__remove js-tour-accommodation-remove" aria-label="Удалить место проживания">Удалить</button>
            </div>
            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                <span class="user-tour-create-form__label">Описание</span>
                <div class="user-tour-create-form__editor-wrap">
                    <div class="user-tour-create-form__quill js-tour-accommodation-quill"></div>
                    <input type="hidden" class="js-tour-accommodation-desc" name="tour_accommodation[0][description]" value="" />
                </div>
            </div>
            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                <span class="user-tour-create-form__label">Изображения места проживания</span>
                <p class="user-tour-create-form__formats user-tour-create-form__formats--inline">JPG, PNG или WebP</p>
                <label class="user-tour-create-form__file user-tour-create-form__file--wide">
                    <input class="user-tour-create-form__file-input js-tour-accommodation-gallery" name="tour_accommodation[0][izobrazheniya_mesta_prozhivaniya][]" type="file" accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp" multiple />
                    <span class="user-tour-create-form__file-text">Загрузить изображения</span>
                </label>
                <div class="user-tour-create-form__preview-grid js-tour-accommodation-gallery-previews" aria-live="polite"></div>
                <p class="user-tour-create-form__file-error js-tour-accommodation-gallery-error" role="alert" hidden></p>
            </div>
        </div>
    </template>
    
    <template id="tour-program-stage-template">
        <div class="user-tour-create-program-stage js-tour-program-stage">
            <div class="user-tour-create-program-stage__head">
                <h3 class="user-tour-create-program-stage__title">Этап программы</h3>
                <button type="button" class="user-tour-create-program-stage__remove js-tour-program-stage-remove" aria-label="Удалить этап">Удалить этап</button>
            </div>
            <label class="user-tour-create-program-stage__name-field">
                <span class="user-tour-create-form__label">Название этапа</span>
                <input
                    class="user-tour-create-form__input js-tour-program-stage-title"
                    type="text"
                    name="tour_program_stages[0][nazvanie_etapa]"
                    autocomplete="off"
                    placeholder="Например: День 1 — прибытие"
                />
            </label>
    
            <div class="user-tour-create-program-stage__block">
                <div class="user-tour-create-form__section-head user-tour-create-form__section-head--nested">
                    <h4 class="user-tour-create-form__subsection-title user-tour-create-form__subsection-title--sm">Этапы внутри дня</h4>
                    <button type="button" class="user-tour-create-form__add-btn user-tour-create-form__add-btn--secondary js-tour-add-day-step">
                        Добавить этап внутри дня
                    </button>
                </div>
                <div class="user-tour-create-program-day-steps js-tour-program-day-steps"></div>
            </div>
    
            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                <span class="user-tour-create-form__label">Галерея изображений</span>
                <p class="user-tour-create-form__formats user-tour-create-form__formats--inline">JPG, PNG или WebP</p>
                <label class="user-tour-create-form__file user-tour-create-form__file--wide">
                    <input class="user-tour-create-form__file-input js-tour-program-stage-gallery" name="tour_program_stages[0][gallery][]" type="file" accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp" multiple />
                    <span class="user-tour-create-form__file-text">Загрузить изображения этапа</span>
                </label>
                <div class="user-tour-create-form__preview-grid js-tour-program-stage-gallery-previews" aria-live="polite"></div>
                <p class="user-tour-create-form__file-error js-tour-program-stage-gallery-error" role="alert" hidden></p>
            </div>
        </div>
    </template>
    
    <template id="tour-program-day-step-template">
        <div class="user-tour-create-program-day-step js-tour-program-day-step">
            <div class="user-tour-create-program-day-step__head">
                <span class="user-tour-create-program-day-step__label">Блок дня</span>
                <button type="button" class="user-tour-create-program-day-step__remove js-tour-program-day-step-remove" aria-label="Удалить блок">Удалить</button>
            </div>
            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                <label class="user-tour-create-form__label">Заголовок</label>
                <input class="user-tour-create-form__input js-tour-program-day-heading" type="text" name="tour_program_stages[0][day_steps][0][heading]" autocomplete="off" />
            </div>
            <div class="user-tour-create-form__field user-tour-create-form__field--full">
                <label class="user-tour-create-form__label">Описание</label>
                <textarea class="user-tour-create-form__textarea js-tour-program-day-description" name="tour_program_stages[0][day_steps][0][description]" rows="3"></textarea>
            </div>
        </div>
    </template>

</main>
<?php
get_footer();
