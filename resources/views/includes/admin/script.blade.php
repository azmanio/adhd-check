<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/color-modes.js') }}"></script>

<!-- CoreUI and necessary plugins-->
<script src="{{ asset('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('node_modules/simplebar/dist/simplebar.min.js') }}"></script>

<script>
    const header = document.querySelector('header.header');

    document.addEventListener('scroll', () => {
        if (header) {
            header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
    });
</script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset('node_modules/chart.js/dist/chart.umd.js') }}">
    < /> <
    script src = "{{ asset('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.js') }}" >
</script>
<script src="{{ asset('node_modules/@coreui/utils/dist/umd/index.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        bsCustomFileInput.init()
    })
</script>

@stack('script')
