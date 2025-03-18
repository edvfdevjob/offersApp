<div>
    <x-welcome />

    <div class="bg-opacity-25">
        <h3 class="text-center mt-3">Ofertas Disponibles</h3>

        <div class="d-flex flex-wrap justify-center">
            @if ($offers && count($offers))
            @foreach ($offers as $offer)
            <div class="card m-3 text-center" style="width: 13rem;">
                <div class="card-body">
                    <p class="card-text w-auto">{{ Str::limit($offer->description, 30, '...') }}</p>

                    @if ($offer->acquired)
                        @if ($offer->redeemed)
                            <button class="btn btn-secondary btn-sm" disabled>Canjeado</button>
                        @else
                            <button class="btn btn-success btn-sm" disabled>Adquirido</button>
                        @endif
                    @else
                        <button class="btn btn-primary btn-sm" 
                                wire:click="add({{ $offer->id }})"
                                wire:loading.attr="disabled"
                                wire:target="add({{ $offer->id }})">
                            <span wire:loading.remove wire:target="add({{ $offer->id }})">Adquirir</span>
                            <span wire:loading wire:target="add({{ $offer->id }})">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                            </span>
                        </button>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <p> No hay Ofertas disponibles por el momento. Mantente al tanto y conseguirás :)</p>
            @endif
        </div>
    </div>
</div>
