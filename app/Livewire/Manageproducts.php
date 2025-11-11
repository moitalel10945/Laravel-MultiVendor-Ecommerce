<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Manageproducts extends Component
{
    use WithFileUploads;
    use WithPagination;
    #[Rule('required|string|max:50|min:2')]
    public $productName;

    #[Rule('required|numeric|min:1')]
    public $productPrice;

    #[Rule('nullable|max:1024|image')]
    public $productImage;

    #[Rule('required|numeric|max:100')]
    public $productCategory;

    #[Rule('required|numeric|max:1000')]
    public $productStock;

    #[Rule('required|numeric|max:100')]
    public $productStore;
    public $selectedProductId ='';
    public function create(){
        $validated=$this->validate();

        $path=$this->productImage ? $this->productImage->store('uploads','public'):null;
        $user=Auth::user();
        if($user){
            Product::create(
                [
                    'name'=>$this->productName,
                    'category_id'=>$this->productCategory,
                    'price'=>$this->productPrice,
                    'image'=>$path,
                    'user_id'=>Auth::id(),
                    'stock'=>$this->productStock,
                    'store_id'=>$this->productStore
    
                ]
                );

                session()->flash('success','Product added successfully.');

        }
        else{
            abort(403, 'Only for authenticated users');
        }
        
        

             $this->reset(['productName','productPrice','productCategory','productStock','productStore','productImage']);


    }
    public function edit(Product $product){
        $this->selectedProductId=$product->id;
        $this->productName=$product->name;
        $this->productPrice=$product->price;
        $this->productCategory=$product->category_id;
        $this->productStock=$product->stock;
        $this->productStore=$product->store_id;
        

    }

    public function update(){
        $validated= $this->validate();
        $product =Product::find($this->selectedProductId);
        $path= $this->productImage? $this->productImage->store('uploads','public'):$product->image;
        $user=Auth::user();
        if($user && $product->user_id==$user->id){
            $product->update([
                'name'=>$this->productName,
                'price'=>$this->productPrice,
                'category_id'=>$this->productCategory,
                'stock'=>$this->productStock,
                'store_id'=>$this->productStore,
                'image'=>$path,
                'user_id'=>Auth::id()
    
            ]);
        }
        else{
            abort(403 ,'Only The product owners can update their products');
        }
        
        
    }

    public function cancel(){
        $this->reset(['productName','productPrice','productCategory','productStock','productStore','productImage']);
    }

    public function delete(Product $product){
        $user=Auth::user();
        
        if($user && $product->user_id==$user->id){
            $product->delete();
        }
        else{
            abort(403,'Not authorised');
        }
        

    }
    public function render()
    {
        $products=Product::where('user_id',Auth::id())->paginate(1);
        return view('livewire.manageproducts',compact('products'));
    }
}
