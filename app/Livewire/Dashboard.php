<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offer;
use App\Models\PromotionalCode;
use Illuminate\Support\Str;

class Dashboard extends Component
{
    public $offers;

    public function render()
    {
        $userId = auth()->id();

        $this->offers = Offer::leftJoin('promotional_codes as pc', function ($join) use ($userId) {
                $join->on('offers.id', '=', 'pc.offer_id')
                    ->where('pc.user_id', '=', $userId);
            })
            ->select('offers.*', 'pc.id as acquired', 'pc.redeemed')
            ->get();

        return view('livewire.dashboard');
    }

    public function add($id)
    {
        if ($id) {
            do {
                $code = Str::random(8);
            } while (PromotionalCode::where('code', $code)->exists()); // Verificar que no exista
    
            PromotionalCode::create([
                'user_id' => \Auth::user()->id,
                'offer_id' => $id,
                'code' => $code
            ]);

            toastr()->success('Has Adquirido una nueva oferta!', 'Felicidades');
        }
    }
}
