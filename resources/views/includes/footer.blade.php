        <div class="d-flex justify-content-center align-items-center">
            <span class="pt-2 pb-2">by <a href="https://www.linkedin.com/in/ahmed-abdel-fattah-a10b65172/" target="_blank" style="color: #dc3545">Ahmed Abdel-Fattah</a> &copy; 2022</span>
        </div>
        <script src="{{ asset('js/jquery_3.6.min.js') }}" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @yield('scripts')
        <script>
            window.addEventListener('openModalCreate', event => {
                $('#modalFormCreate').modal('show');
            });

            window.addEventListener('closeModalCreate', event => {
                $('#modalFormCreate').modal('hide');
            });
            window.addEventListener('openModalEdit', event => {
                $('#modalFormEdit').modal('show');
            });

            window.addEventListener('closeModalEdit', event => {
                $('#modalFormEdit').modal('hide');
            });

            window.addEventListener('openModal', event => {
                $('#modalForm').modal('show');
            });

            window.addEventListener('closeModal', event => {
                $('#modalForm').modal('hide');
            });

            window.addEventListener('openDeleteModal', event => {
                $('#modalDeleteTodo').modal('show');
            });

            window.addEventListener('closeDeleteModal', event => {
                $('#modalDeleteTodo').modal('hide');
            });

            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            });
        </script>
    </body>
</html>
