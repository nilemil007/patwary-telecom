<!-- Tabler Core -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{ asset('dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- Sweetalert -->
@include('sweetalert::alert')

<!-- Custom Scripts -->
@stack('js')

<!-- Livewire Scripts -->
@livewireScripts
