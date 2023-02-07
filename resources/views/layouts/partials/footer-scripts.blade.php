<!-- Tabler Core -->
<script src="{{ asset('dist/js/tabler.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.min.js') }}"></script>

<!-- Sweetalert -->
@include('sweetalert::alert')

<!-- Custom Scripts -->
@stack('js')

<!-- Livewire Scripts -->
@livewireScripts
