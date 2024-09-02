<div {{ $attributes->merge([
    'class' => 'modal fade',
    'id' => 'modal-form',
    'aria-labelledby' => 'exampleModalLabel',
    'aria-hidden' => 'true'
]) }} >

    <div class="col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <form method="{{ isset($method) ? $method : 'post' }}">
                                       
                <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            @isset($title)
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endisset

                            <div class="modal-body">
                                {{ $slot }}
                            </div>

                            @isset($footer)
                            <div class="modal-footer">
                                {{ $footer }}
                            </div>
                            @endisset
                                            
                        </div>
                    </div>
                </div>                
           </form>
        </div>
    </div>
</div>

