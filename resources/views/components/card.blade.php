<div {{ $attributes->merge(['class', 'card card-outline']) }}>
    <div class="d-flex flex-column">
        @isset($header)
            <div class="card-header bg-white widget-header">
                {{ $header }}
            </div>
        @endisset

        <div class="card-body widget-content widget-content-area" style="flex: 1;">
            {{ $slot }}
        </div>

        @isset($footer)
            <div class="card-footer">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>