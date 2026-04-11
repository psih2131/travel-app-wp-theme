<?php
$user_id = get_current_user_id();
$avatar_url = '';
$avatar_alt = 'Аватар';

if ( $user_id && function_exists( 'get_field' ) ) {
    $avatar = get_field( 'avatar_polzyvatelya', 'user_' . $user_id );
    if ( is_array( $avatar ) && ! empty( $avatar['url'] ) ) {
        $avatar_url = $avatar['url'];
        $avatar_alt = ! empty( $avatar['alt'] ) ? $avatar['alt'] : $avatar_alt;
    } elseif ( is_numeric( $avatar ) ) {
        $avatar_url = wp_get_attachment_image_url( (int) $avatar, 'full' );
    } elseif ( is_string( $avatar ) && $avatar !== '' ) {
        $avatar_url = $avatar;
    }
}

$default_avatar_url = get_template_directory_uri() . '/assets/image-default/user-image-default.jpg';
if ( ! $avatar_url ) {
    $avatar_url = $default_avatar_url;
}
$avatar_nonce = wp_create_nonce( 'wp_rest' );
?>
<div class="user-profile-card__avatar-wrap js-avatar-wrap" data-rest-nonce="<?php echo esc_attr( $avatar_nonce ); ?>" data-default-avatar="<?php echo esc_url( $default_avatar_url ); ?>">
    <input type="file" class="user-profile-card__avatar-input js-avatar-input" name="avatar" accept=".png,.jpg,.jpeg,.webp" style="position:absolute;width:1px;height:1px;opacity:0;overflow:hidden;" aria-label="Выберите изображение аватара" />
    <img class="user-profile-card__avatar js-avatar-img" src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $avatar_alt ); ?>" width="120" height="120" />
    <button type="button" class="user-profile-card__edit-avatar js-avatar-trigger" aria-label="Изменить фото">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
    </button>
    <button type="button" class="user-profile-card__avatar-delete js-avatar-delete" aria-label="Удалить аватар" title="Удалить аватар">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
    <div class="auth-form__message auth-form__message--avatar js-avatar-message" role="alert" aria-live="polite" hidden></div>
</div>
<script>
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var trigger = document.querySelector('.js-avatar-trigger');
        var input = document.querySelector('.js-avatar-input');
        var img = document.querySelector('.js-avatar-img');
        var messageEl = document.querySelector('.js-avatar-message');
        var wrap = trigger && trigger.closest('.js-avatar-wrap');
        var nonce = (wrap && wrap.getAttribute('data-rest-nonce')) || '';
        var defaultAvatarUrl = (wrap && wrap.getAttribute('data-default-avatar')) || '';
        var deleteBtn = document.querySelector('.js-avatar-delete');

        if (!trigger || !input || !img || !messageEl) return;

        function showMessage(text, isError) {
            messageEl.hidden = !text;
            messageEl.textContent = text || '';
            messageEl.classList.toggle('error', !!isError);
        }

        trigger.addEventListener('click', function() { input.click(); });

        input.addEventListener('change', function() {
            var file = input.files && input.files[0];
            if (!file) return;

            var maxSize = 1024 * 1024;
            var allowed = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'];
            if (file.size > maxSize) {
                showMessage('Размер файла не должен превышать 1 МБ.', true);
                input.value = '';
                return;
            }
            if (allowed.indexOf(file.type) === -1) {
                showMessage('Разрешены только файлы PNG, JPG и WEBP.', true);
                input.value = '';
                return;
            }

            showMessage('', false);
            var fd = new FormData();
            fd.append('avatar', file);

            trigger.disabled = true;
            fetch('/wp-json/custom-endpoints/v1/update-avatar', {
                method: 'POST',
                headers: { 'X-WP-Nonce': nonce },
                credentials: 'same-origin',
                body: fd
            })
            .then(function(res) { return res.json().then(function(data) { return { status: res.status, data: data }; }); })
            .then(function(result) {
                trigger.disabled = false;
                input.value = '';
                if (result.status === 200 && result.data.success) {
                    if (result.data.avatar_url) img.src = result.data.avatar_url;
                    showMessage(result.data.message || 'Аватар обновлён.', false);
                } else {
                    showMessage(result.data.message || 'Не удалось загрузить аватар.', true);
                }
            })
            .catch(function() {
                trigger.disabled = false;
                input.value = '';
                showMessage('Ошибка соединения. Попробуйте снова.', true);
            });
        });

        if (deleteBtn) {
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                showMessage('', false);
                deleteBtn.disabled = true;
                fetch('/wp-json/custom-endpoints/v1/delete-avatar', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-WP-Nonce': nonce },
                    credentials: 'same-origin',
                    body: JSON.stringify({})
                })
                .then(function(res) { return res.json().then(function(data) { return { status: res.status, data: data }; }); })
                .then(function(result) {
                    deleteBtn.disabled = false;
                    if (result.status === 200 && result.data.success) {
                        img.src = defaultAvatarUrl;
                        showMessage(result.data.message || 'Аватар удалён.', false);
                    } else {
                        showMessage(result.data.message || 'Не удалось удалить аватар.', true);
                    }
                })
                .catch(function() {
                    deleteBtn.disabled = false;
                    showMessage('Ошибка соединения. Попробуйте снова.', true);
                });
            });
        }
    });
})();
</script>