<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/purecounter.min.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Ikon Hide
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.innerHTML = '<i class="fa fa-eye"></i>'; // Ikon Show
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const passwordConfirmInput = document.getElementById('passwordConfirm');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirm');

        togglePasswordConfirmButton.addEventListener('click', function() {
            if (passwordConfirmInput.type === 'password') {
                passwordConfirmInput.type = 'text';
                togglePasswordConfirmButton.innerHTML = '<i class="fa fa-eye-slash"></i>'; // Ikon Hide
            } else {
                passwordConfirmInput.type = 'password';
                togglePasswordConfirmButton.innerHTML = '<i class="fa fa-eye"></i>'; // Ikon Show
            }
        });
    });
</script>

@stack('script')
