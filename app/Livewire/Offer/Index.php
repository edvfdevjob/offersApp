<?php

namespace App\Livewire\Offer;

use Livewire\Component;
use App\Models\Offer;
use App\Models\PromotionalCode;
use Illuminate\Support\Str;

class Index extends Component
{
    public $offers;

    public function render()
    {

        $userId = auth()->id();

        $this->offers = Offer::join('promotional_codes as pc', function ($join) use ($userId) {
            $join->on('offers.id', '=', 'pc.offer_id')
                ->where('pc.user_id', '=', $userId);
        })
        ->select('offers.*', 'pc.redeemed')
        ->get();

        return view('livewire.offer.index');
    }

    public function redeem($id)
    {
        if ($id) {
            $promotionalCode = PromotionalCode::where('offer_id', $id)
            ->where('user_id', auth()->id())
            ->first();

            $promotionalCode ? $promotionalCode->update(['redeemed' => 1]) : null;

            toastr()->success('Has Canjeado una oferta con exito', 'Disfruta!');
        }
    }
}
