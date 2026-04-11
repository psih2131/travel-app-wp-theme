<div id="recovery" class="modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container modal-popup auth-popup recovery-popup" role="dialog" aria-modal="true" aria-labelledby="recovery-title">
            <button type="button" class="engram-popup__close" data-micromodal-close aria-label="Закрыть"></button>
            <div class="modal-popup__auth-claster">
                <p class="modal-popup__title" id="recovery-title">Восстановление пароля</p>
                <p class="modal-popup__subtitle">Введите email или логин — мы отправим ссылку для сброса пароля</p>

                <div class="auth-form__message js-recovery-message" role="alert" aria-live="polite" hidden></div>

                <form class="auth-form js-recovery-form">
                    <div class="auth-form__field">
                        <label class="auth-form__label" for="recovery-email">Email или логин</label>
                        <input class="auth-form__input" id="recovery-email" name="email_or_login" type="text" placeholder="email@example.com или логин" required />
                    </div>
                    <button class="auth-btn auth-btn--primary js-recovery-submit" type="submit">Отправить</button>
                </form>

                <p class="auth-form__signup js-recovery-success-text" style="display: none; margin-top: 16px; color: #22c67f; font-weight: 500;">
                    Инструкции для сброса пароля отправлены на вашу почту. Проверьте почтовый ящик.
                </p>

                <p class="auth-form__signup">
                    Вспомнили пароль? <span class="auth-form__link" data-engram-button="auth">Войти</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('.js-recovery-form');
        var submitBtn = document.querySelector('.js-recovery-submit');
        var input = document.querySelector('#recovery-email');
        var messageEl = document.querySelector('.js-recovery-message');
        var successText = document.querySelector('.js-recovery-success-text');

        if (!form || !submitBtn || !input || !messageEl) return;

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var emailOrLogin = input.value.trim();
            if (!emailOrLogin) {
                messageEl.hidden = false;
                messageEl.textContent = 'Введите email или логин.';
                messageEl.classList.add('error');
                successText.style.display = 'none';
                return;
            }

            messageEl.hidden = true;
            messageEl.textContent = '';
            messageEl.classList.remove('error');
            successText.style.display = 'none';
            submitBtn.disabled = true;

            fetch('/wp-json/custom-endpoints/v1/recovery', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email_or_login: emailOrLogin }),
                credentials: 'same-origin'
            })
            .then(function(res) { return res.json().then(function(data) { return { status: res.status, data: data }; }); })
            .then(function(result) {
                submitBtn.disabled = false;
                if (result.status === 200 && result.data.status === 'success') {
                    messageEl.hidden = true;
                    successText.style.display = 'block';
                    input.value = '';
                } else {
                    messageEl.hidden = false;
                    messageEl.textContent = result.data.message || 'Произошла ошибка. Попробуйте позже.';
                    messageEl.classList.add('error');
                }
            })
            .catch(function() {
                submitBtn.disabled = false;
                messageEl.hidden = false;
                messageEl.textContent = 'Ошибка соединения. Попробуйте снова.';
                messageEl.classList.add('error');
            });
        });
    });
</script>
