<div>
    
    <form wire:submit.prevent="{{$selectedProductId ? 'update' : 'create'}}" class="max-w-md mx-auto space-y-4 px-6 bg-white rounded-2xl shadow">
        @if (session('success'))
         <span class="font-semibold text-green-300">{{  session('success')}}</span>
       @endif
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Name:</label>
            <input wire:model="productName" type="text" placeholder="Product Name" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">
            @error('productName')
            <span class="text-xs text-red-500 font-semibold ">{{ $message }}</span>
            @enderror
    
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Category:</label>
            <input wire:model="productCategory" type="text" placeholder="Product Category" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">

            @error('productCategory')
            <span class="text-xs text-red-500 font-semibold ">{{ $message }}</span>
            @enderror
    
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Store:</label>
            <input wire:model="productStore" type="text" placeholder="Product Store" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">

            @error('productStore')
            <span class="text-xs text-red-500  font-semibold">{{ $message }}</span>
            @enderror
    
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Image:</label>
            <input wire:model="productImage" type="file" placeholder="Product Image" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">

            @error('productImage')
            <span class="text-xs text-red-500  font-semibold">{{ $message }}</span>
            @enderror
    
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Price:</label>
            <input wire:model="productPrice" type="text" placeholder="Product Price" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">

            @error('productPrice')
            <span class="text-xs text-red-500 font-semibold ">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-sm font-semibold text-gray-600">Product Stock:</label>
            <input wire:model="productStock" type="text" placeholder="Product Stock" class="px-4 py-2 rounded-xl bg-gray-200 border mb-4 focus: ring focus:ring-green-200 ">

            @error('productStock')
            <span class="text-xs text-red-500 font-semibold ">{{ $message }}</span>
            @enderror
    
        </div>
        <div class="flex space-x-2">
            @if (auth()->user())

            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-xl hover:bg-green-300 cursor-pointer">
                {{ $selectedProductId ? 'Update Product' : 'Upload Product' }}
            </button>
             <button  wire:click="cancel" class="px-4 py-2 bg-red-500 text-white rounded-xl hover:bg-red-300 cursor-pointer">Cancel</button>
               
            @else
                <p class="text-red-500">!Only Authorised product owners can create products</p>
            @endif
        </div>
        
        
    </form>
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mx-6">
        @forelse ($products as $product)
        <div class="flex flex-col bg-white shadow rounded-xl border items-center space-y-2 p-4">
            <h1 class="text-xl font-bold">{{ $product->name }}</h1>
        
            <img src="{{ asset('storage/'. $product->image) }} " class="w-32 h-32 object-cover rounded-xl">
    
           <p>Costs:$<strong>{{ $product->price }}</strong> only</p>
           @if (auth()->user()->id === $product->user_id)

           <button wire:click.prevent="delete({{ $product->id }})" class="bg-red-500 px-4 py-2 text-white rounded-xl hover:bg-red-300 cursor-pointer">Delete</button>
           <button wire:click.prevent="edit({{ $product->id }})" class="bg-green-500 px-4 py-2 text-white rounded-xl hover:bg-green-300 cursor-pointer ">Edit</button>
               
           @else
             <p class="text-red-500">!Only authenticated users and product owners can edit and delete their Products</p>
           @endif
           
        </div> 
        
    @empty
      <h1>No products. Yet to be added</h1>  
    @endforelse

</div>
{{ $products->links() }}
</div>

    
