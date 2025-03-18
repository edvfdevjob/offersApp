<div>
    <div class="bg-opacity-25">
        <h3 class="text-center mt-3">Mis Ofertas</h3>

        <div class="d-flex flex-wrap justify-center">
            @if ($offers && count($offers))
            @foreach ($offers as $offer)
            <div class="card m-3 text-center" style="width: 13rem;">
                <div class="card-body">
                    <p class="card-text w-auto">{{ Str::limit($offer->description, 30, '...') }}</p>

                    @if ($offer->redeemed)
                        <button class="btn btn-success btn-sm" disabled>Canjeado</button>
                    @else
                        <button class="btn btn-primary btn-sm" 
                                wire:click="redeem({{ $offer->id }})"
                                wire:loading.attr="disabled"
                                wire:target="redeem({{ $offer->id }})">
                            <span wire:loading.remove wire:target="redeem({{ $offer->id }})">Canjear</span>
                            <span wire:loading wire:target="redeem({{ $offer->id }})">
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
            <p> No tienes Ofertas Agregadas. Puedes dirigirte a la seccion principal de la aplicacion para agregar cualquier oferta que este disponible al momento. Mucha Suerte :)</p>
            @endif

        </div>
    </div>
</div>
