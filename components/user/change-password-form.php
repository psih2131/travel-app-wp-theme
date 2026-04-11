<?php
/**
 * Компонент: форма смены пароля (вкладка «Логин и пароль»).
 */
$change_password_nonce = wp_create_nonce( 'wp_rest' );
?>
<div class="user-profile-form-wrap">
    <h2 class="user-profile-form-wrap__title">Логин и пароль</h2>
    <p class="user-profile-form-wrap__lead">Хотите сменить пароль?</p>

    <div class="auth-form__message js-change-password-message" role="alert" aria-live="polite" hidden></div>

    <form class="user-profile-form user-profile-form--password js-change-password-form" data-rest-nonce="<?php echo esc_attr( $change_password_nonce ); ?>">
        <div class="user-profile-form__field user-profile-form__field--full">
            <label class="user-profile-form__label" for="profile-current-password">Введите текущий пароль</label>
            <div class="auth-form__input-wrap">
                <input class="user-profile-form__input auth-form__input" id="profile-current-password" name="current_password" type="password" placeholder="••••••••" autocomplete="current-password" />
                <button class="auth-form__toggle-password" type="button" aria-label="Показать пароль">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <span class="user-profile-form__error js-field-error" data-field="current_password" hidden></span>
        </div>
        <div class="user-profile-form__field user-profile-form__field--full">
            <label class="user-profile-form__label" for="profile-new-password">Введите новый пароль</label>
            <div class="auth-form__input-wrap">
                <input class="user-profile-form__input auth-form__input" id="profile-new-password" name="new_password" type="password" placeholder="••••••••" autocomplete="new-password" minlength="6" />
                <button class="auth-form__toggle-password" type="button" aria-label="Показать пароль">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <span class="user-profile-form__error js-field-error" data-field="new_password" hidden></span>
        </div>
        <div class="user-profile-form__field user-profile-form__field--full">
            <label class="user-profile-form__label" for="profile-repeat-password">Повторите пароль</label>
            <div class="auth-form__input-wrap">
                <input class="user-profile-form__input auth-form__input" id="profile-repeat-password" name="new_password_repeat" type="password" placeholder="••••••••" autocomplete="new-password" minlength="6" />
                <button class="auth-form__toggle-password" type="button" aria-label="Показать пароль">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
            <span class="user-profile-form__error js-field-error" data-field="new_password_repeat" hidden></span>
        </div>
        <div class="user-profile-form__actions">
            <a class="user-profile-form__link user-profile-form__forgot-link" href="#" data-engram-button="recovery">Забыл пароль</a>
            <button type="submit" class="user-profile-form__btn user-profile-form__btn--primary js-change-password-submit">Сменить</button>
        </div>
    </form>
</div>
<script>
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.js-change-password-form');
        var submitBtn = document.querySelector('.js-change-password-submit');
        var messageEl = document.querySelector('.js-change-password-message');
        var currentInput = document.getElementById('profile-current-password');
        var newInput = document.getElementById('profile-new-password');
        var repeatInput = document.getElementById('profile-repeat-password');
        var errorEls = document.querySelectorAll('.js-change-password-form .js-field-error');
        var MIN_LENGTH = 6;

        if (!form || !submitBtn || !messageEl || !currentInput || !newInput || !repeatInput) return;

        function showMessage(text, isError) {
            messageEl.hidden = !text;
            messageEl.textContent = text || '';
            messageEl.classList.toggle('error', !!isError);
        }

        function showFieldError(fieldName, text) {
            var el = form.querySelector('.js-field-error[data-field="' + fieldName + '"]');
            if (el) {
                el.hidden = !text;
                el.textContent = text || '';
                var field = el.closest('.user-profile-form__field');
                if (field) field.classList.toggle('has-error', !!text);
            }
        }

        function clearFieldErrors() {
            errorEls.forEach(function(el) {
                el.hidden = true;
                el.textContent = '';
                var field = el.closest('.user-profile-form__field');
                if (field) field.classList.remove('has-error');
            });
            form.querySelectorAll('.user-profile-form__field.has-error').forEach(function(f) { f.classList.remove('has-error'); });
        }

        function validate() {
            var current = (currentInput && currentInput.value) ? currentInput.value : '';
            var newPass = (newInput && newInput.value) ? newInput.value : '';
            var repeat = (repeatInput && repeatInput.value) ? repeatInput.value : '';
            var valid = true;

            clearFieldErrors();

            if (!current.trim()) {
                showFieldError('current_password', 'Введите текущий пароль.');
                valid = false;
            }
            if (newPass.length < MIN_LENGTH) {
                showFieldError('new_password', 'Минимум ' + MIN_LENGTH + ' символов.');
                valid = false;
            }
            if (newPass !== repeat) {
                showFieldError('new_password_repeat', 'Пароли не совпадают.');
                valid = false;
            }
            return valid;
        }

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            showMessage('', false);
            if (!validate()) {
                showMessage('Заполните поля и исправьте ошибки.', true);
                return;
            }

            submitBtn.disabled = true;
            var nonce = form.getAttribute('data-rest-nonce') || '';
            fetch('/wp-json/custom-endpoints/v1/change-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': nonce
                },
                credentials: 'same-origin',
                body: JSON.stringify({
                    current_password: currentInput.value,
                    new_password: newInput.value,
                    new_password_repeat: repeatInput.value
                })
            })
            .then(function(res) { return res.json().then(function(data) { return { status: res.status, data: data }; }); })
            .then(function(result) {
                submitBtn.disabled = false;
                if (result.status === 200 && result.data.success) {
                    showMessage(result.data.message || 'Пароль успешно изменён.', false);
                    currentInput.value = '';
                    newInput.value = '';
                    repeatInput.value = '';
                    clearFieldErrors();
                } else {
                    showMessage(result.data.message || 'Не удалось сменить пароль.', true);
                }
            })
            .catch(function() {
                submitBtn.disabled = false;
                showMessage('Ошибка соединения. Попробуйте снова.', true);
            });
        });

        var toggles = form.querySelectorAll('.auth-form__toggle-password');
        toggles.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var wrap = btn.closest('.auth-form__input-wrap');
                var input = wrap && wrap.querySelector('input');
                if (!input) return;
                var isPass = input.type === 'password';
                input.type = isPass ? 'text' : 'password';
                btn.setAttribute('aria-label', isPass ? 'Скрыть пароль' : 'Показать пароль');
            });
        });
    });
})();
</script>
