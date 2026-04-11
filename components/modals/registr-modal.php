<div id="registr" class="modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container modal-popup auth-popup registr-popup" role="dialog" aria-modal="true" aria-labelledby="registr-title">
            <button type="button" class="engram-popup__close" data-micromodal-close aria-label="Закрыть"></button>
            <div class="modal-popup__auth-claster">
                <p class="modal-popup__title" id="registr-title">Создать аккаунт</p>
                <p class="modal-popup__subtitle">Заполните форму для регистрации</p>

                <div class="auth-form js-registr-form" id="travel-registr-form">
                    <div class="auth-form__field">
                        <label class="auth-form__label" for="registr-name">Полное имя</label>
                        <input class="auth-form__input" id="registr-name" name="full_name" type="text" placeholder="Иван Иванов" required minlength="2" />
                    </div>
                    <div class="auth-form__field">
                        <label class="auth-form__label" for="registr-email">Рабочий email</label>
                        <input class="auth-form__input" id="registr-email" name="email" type="email" placeholder="nathan.roberts@example.com" required />
                        <p class="auth-form__hint">
                            <svg class="auth-form__hint-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
                            Используйте рабочий email
                        </p>
                    </div>
                    <div class="auth-form__field">
                        <label class="auth-form__label" for="registr-password">Пароль</label>
                        <div class="auth-form__input-wrap">
                            <input class="auth-form__input" id="registr-password" name="password" type="password" placeholder="••••••••••••" required minlength="6" />
                            <button class="auth-form__toggle-password" type="button" aria-label="Показать пароль">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="auth-form__field">
                        <label class="auth-form__label" for="registr-password-confirm">Подтвердите пароль</label>
                        <div class="auth-form__input-wrap">
                            <input class="auth-form__input" id="registr-password-confirm" name="password_confirm" type="password" placeholder="••••••••••••" required minlength="6" />
                            <button class="auth-form__toggle-password" type="button" aria-label="Показать пароль">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="auth-form__field">
                        <label class="auth-form__agree">
                            <input type="checkbox" name="agree" id="registr-agree" class="auth-form__checkbox" value="1" required checked />
                            <span>Я согласен с <a class="auth-form__link" href="#">Условиями использования</a> и <a class="auth-form__link" href="#">Политикой конфиденциальности</a></span>
                        </label>
                    </div>
                    <button class="auth-btn auth-btn--primary js-registr-submit" type="submit">Создать аккаунт</button>

                    <!-- Скрытая кнопка для открытия модалки «Регистрация успешна» после успешной отправки -->
                    <button type="button" id="js-registr-success-trigger" data-engram-button="registr-success" class="visually-hidden" aria-hidden="true" tabindex="-1">Открыть</button>

                    <div class="auth-form__message js-registr-message"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const registrModal = document.getElementById('registr');
        const form = document.querySelector('.js-registr-form');
        const sendBtn = document.querySelector('.js-registr-submit');
        const userName = document.querySelector('#registr-name');
        const userEmail = document.querySelector('#registr-email');
        const userPassword = document.querySelector('#registr-password');
        const userPasswordConfirm = document.querySelector('#registr-password-confirm');
        const userAgree = document.querySelector('#registr-agree');
        const registrMessage = document.querySelector('.js-registr-message');

        function clearRegistrForm() {
            if (userName) userName.value = '';
            if (userEmail) userEmail.value = '';
            if (userPassword) userPassword.value = '';
            if (userPasswordConfirm) userPasswordConfirm.value = '';
            if (userAgree) userAgree.checked = true;
            if (registrMessage) {
                registrMessage.hidden = true;
                registrMessage.innerHTML = '';
                registrMessage.classList.remove('error');
            }
            if (form) form.classList.remove('is-validated');
        }

        sendBtn.addEventListener('click', function(event) {
            event.preventDefault();
            if (form) {
                form.classList.add('is-validated');
            }
            fieldsValidation();
        });

        if (registrModal) {
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class' || mutation.attributeName === 'aria-hidden') {
                        if (!registrModal.classList.contains('is-open')) {
                            clearRegistrForm();
                        }
                    }
                });
            });
            observer.observe(registrModal, { attributes: true });
        }

        const fieldsValidation = () => {
            serverRequestRegister()
        }

        async function serverRequestRegister(){
            const url = '/wp-json/custom-endpoints/v1/register';

            let userPayload = {
                user_name: userName.value,
                email: userEmail.value,
                password: userPassword.value,
            }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(userPayload),
                });

                const data = await response.json();

                console.log(data);

                registrMessage.hidden = false;

                if ( response.ok && data.status === 'success' ) {
                    registrMessage.innerHTML = data.message;
                    registrMessage.classList.remove('error');
                    clearRegistrForm();
                    var successTrigger = document.getElementById('js-registr-success-trigger');
                    if (successTrigger) {
                        successTrigger.click();
                    }
                } else {
                    registrMessage.classList.add('error');
                    registrMessage.innerHTML = data.message || ( data.data && data.data.params ? Object.values( data.data.params ).flat().join( ', ' ) : ( data.code || 'Ошибка регистрации' ) );
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    });
</script>
