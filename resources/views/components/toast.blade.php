@push('scripts')
    @if(session()->has('success'))
    <script>
        // console.log('cokcok')
        $(document).ready(function() {
            toastr.success('{{ session('message') }}', 'Success');

            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        });
    </script>
    @elseif (session()->has('error_msg'))
    <script>
        $(document).ready(function() {
            toastr.error('{{ session('message') }}', 'Error');

            setTimeout(() => {
                $('.toasts-top-right').remove();
            }, 3000);
        });
    </script>
    @endif
@endpush
