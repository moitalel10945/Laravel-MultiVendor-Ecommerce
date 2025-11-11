<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SellerOrders extends Component
{
    use WithPagination;
    public function render()
    {
        $sellerId=Auth::id();
        $orders=Order::whereHas('orderItems.product', function($query) use($sellerId){
            $query->where('user_id',$sellerId);
        })->with('user','orderItems.product')->paginate(10);
        return view('livewire.seller-orders',['orders'=>$orders,]);
    }
}
