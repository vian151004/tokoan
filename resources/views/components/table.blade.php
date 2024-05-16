<div class="table-responsive-xxl" style="overflow-y: hidden;" >
    <table id="customer-info-detail-3" {{ $attributes->merge([
                'class', 'table table style-3 table-bordered  table-hover widget-content widget-content-area mt-2 mb-4']) 
            }}>

        @isset($thead)
            <thead class="bg-white">
                {{ $thead }}
            </thead>
        @endisset

        <tbody>
            {{ $slot }}
        </tbody>

        @isset($tfoot)
            <tfoot>
                {{ $tfoot }}
            </tfoot>
        @endisset
    </table>
</div>