<?php
$user    = wp_get_current_user();
$user_id = $user->ID;
$user_email = $user->user_email;

$acf_imya           = '';
$acf_familiya       = '';
$acf_adress         = '';
$acf_nomer_telefona = '';
$acf_gorod          = '';
$acf_indeks         = '';
$acf_pol            = '';
$acf_data_rozhdeniya = '';
if ( function_exists( 'get_field' ) && $user_id ) {
    $acf_imya           = get_field( 'imya', 'user_' . $user_id );
    $acf_familiya       = get_field( 'familiya', 'user_' . $user_id );
    $acf_adress         = get_field( 'adress', 'user_' . $user_id );
    $acf_nomer_telefona = get_field( 'nomer_telefona', 'user_' . $user_id );
    $acf_gorod          = get_field( 'gorod', 'user_' . $user_id );
    $acf_indeks         = get_field( 'indeks', 'user_' . $user_id );
    $acf_pol            = get_field( 'pol', 'user_' . $user_id );
    $acf_data_rozhdeniya = get_field( 'data_rozhdeniya', 'user_' . $user_id );
    $acf_imya           = is_string( $acf_imya ) ? $acf_imya : '';
    $acf_familiya       = is_string( $acf_familiya ) ? $acf_familiya : '';
    $acf_adress         = is_string( $acf_adress ) ? $acf_adress : '';
    $acf_nomer_telefona = $acf_nomer_telefona !== '' && $acf_nomer_telefona !== null ? (string) $acf_nomer_telefona : '';
    $acf_gorod          = is_string( $acf_gorod ) ? $acf_gorod : '';
    $acf_indeks         = $acf_indeks !== '' && $acf_indeks !== null ? (string) $acf_indeks : '';
    $acf_pol            = is_string( $acf_pol ) ? $acf_pol : '';
    if ( $acf_data_rozhdeniya ) {
        if ( is_string( $acf_data_rozhdeniya ) && preg_match( '/^\d{4}-\d{2}-\d{2}$/', $acf_data_rozhdeniya ) ) {
            $acf_data_rozhdeniya = $acf_data_rozhdeniya;
        } elseif ( is_numeric( $acf_data_rozhdeniya ) ) {
            $acf_data_rozhdeniya = date( 'Y-m-d', (int) $acf_data_rozhdeniya );
        } elseif ( is_string( $acf_data_rozhdeniya ) ) {
            $ts = strtotime( $acf_data_rozhdeniya );
            $acf_data_rozhdeniya = $ts ? date( 'Y-m-d', $ts ) : '';
        } else {
            $acf_data_rozhdeniya = '';
        }
    } else {
        $acf_data_rozhdeniya = '';
    }
}
?>

<?php $user_data_nonce = wp_create_nonce( 'wp_rest' ); ?>
<div class="user-profile-form-wrap">
    <h2 class="user-profile-form-wrap__title">Личные данные</h2>

    <div class="auth-form__message js-user-data-message" role="alert" aria-live="polite" hidden></div>

    <form class="user-profile-form js-user-data-form" data-rest-nonce="<?php echo esc_attr( $user_data_nonce ); ?>">
        <div class="user-profile-form__field user-profile-form__field--radio user-profile-form__field--full">
            <p class="user-profile-form__label">Пол</p>
            <div class="user-profile-form__radios">
                <label class="user-profile-form__radio-label">
                    <input type="radio" name="pol" value="Не выбрано" class="user-profile-form__radio"<?php echo ( $acf_pol === 'Не выбрано' || $acf_pol === '' ) ? ' checked' : ''; ?> />
                    <span>Не выбрано</span>
                </label>
                <label class="user-profile-form__radio-label">
                    <input type="radio" name="pol" value="Мужчина" class="user-profile-form__radio" <?php checked( $acf_pol, 'Мужчина' ); ?> />
                    <span>Мужчина</span>
                </label>
                <label class="user-profile-form__radio-label">
                    <input type="radio" name="pol" value="Женщина" class="user-profile-form__radio" <?php checked( $acf_pol, 'Женщина' ); ?> />
                    <span>Женщина</span>
                </label>
            </div>
        </div>
        <div class="user-profile-form__field user-profile-form__field--full">
            <label class="user-profile-form__label" for="profile-firstname">Имя</label>
            <input class="user-profile-form__input" id="profile-firstname" name="imya" type="text" value="<?php echo esc_attr( $acf_imya ); ?>" />
        </div>
        <div class="user-profile-form__field user-profile-form__field--full">
            <label class="user-profile-form__label" for="profile-lastname">Фамилия</label>
            <input class="user-profile-form__input" id="profile-lastname" name="familiya" type="text" value="<?php echo esc_attr( $acf_familiya ); ?>" />
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-email">Email</label>
            <div class="user-profile-form__input-row">
                <input class="user-profile-form__input" id="profile-email" type="email" value="<?php echo esc_attr( $user_email ); ?>" readonly />
                <span class="user-profile-form__verified">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                    Подтверждён
                </span>
            </div>
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-address">Адрес</label>
            <input class="user-profile-form__input" id="profile-address" name="adress" type="text" value="<?php echo esc_attr( $acf_adress ); ?>" />
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-phone">Номер телефона</label>
            <input class="user-profile-form__input" id="profile-phone" name="nomer_telefona" type="tel" value="<?php echo esc_attr( $acf_nomer_telefona ); ?>" />
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-birthdate">Дата рождения</label>
            <input class="user-profile-form__input" id="profile-birthdate" name="data_rozhdeniya" type="date" value="<?php echo esc_attr( $acf_data_rozhdeniya ); ?>" />
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-location">Город</label>
            <input class="user-profile-form__input" id="profile-location" name="gorod" type="text" value="<?php echo esc_attr( $acf_gorod ); ?>" />
        </div>
        <div class="user-profile-form__field">
            <label class="user-profile-form__label" for="profile-postal">Почтовый индекс</label>
            <input class="user-profile-form__input" id="profile-postal" name="indeks" type="text" inputmode="numeric" value="<?php echo esc_attr( $acf_indeks ); ?>" />
        </div>
        <div class="user-profile-form__actions">
            <!-- <button type="button" class="user-profile-form__btn user-profile-form__btn--secondary">Отменить</button> -->
            <button type="submit" class="user-profile-form__btn user-profile-form__btn--primary js-user-data-submit">Сохранить</button>
        </div>
    </form>
</div>
<script>
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.js-user-data-form');
        var submitBtn = form && form.querySelector('.js-user-data-submit');
        var messageEl = document.querySelector('.js-user-data-message');
        if (!form || !submitBtn || !messageEl) return;

        function showMessage(text, isError) {
            messageEl.hidden = !text;
            messageEl.textContent = text || '';
            messageEl.classList.toggle('error', !!isError);
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var fd = new FormData(form);
            var payload = {
                imya: (fd.get('imya') || '').trim(),
                familiya: (fd.get('familiya') || '').trim(),
                adress: (fd.get('adress') || '').trim(),
                gorod: (fd.get('gorod') || '').trim(),
                nomer_telefona: (fd.get('nomer_telefona') || '').trim(),
                indeks: (fd.get('indeks') || '').trim(),
                pol: fd.get('pol') || '',
                data_rozhdeniya: (fd.get('data_rozhdeniya') || '').trim()
            };
            submitBtn.disabled = true;
            showMessage('', false);

            fetch('/wp-json/custom-endpoints/v1/update-profile', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': form.getAttribute('data-rest-nonce') || ''
                },
                credentials: 'same-origin',
                body: JSON.stringify(payload)
            })
            .then(function(res) { return res.json().then(function(data) { return { status: res.status, data: data }; }); })
            .then(function(result) {
                submitBtn.disabled = false;
                if (result.status === 200 && result.data.success) {
                    showMessage(result.data.message || 'Данные сохранены.', false);
                } else {
                    showMessage(result.data.message || 'Не удалось сохранить данные.', true);
                }
            })
            .catch(function() {
                submitBtn.disabled = false;
                showMessage('Ошибка соединения. Попробуйте снова.', true);
            });
        });
    });
})();
</script>