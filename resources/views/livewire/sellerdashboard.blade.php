<div>
  <nav class="bg-gray-500 mb-5 px-10 py-4 mt-3 border border-gray-500 flex justify-evenly">
    <button wire:click.prevent="$set('tab','products')" class="{{ $tab==='products'? 'bg-blue-500': 'bg-green-500' }} px-6 py-3 rounded-xl text-white ">My Products</button>
    <button wire:click.prevent="$set('tab','orders')" class="{{ $tab==='orders'? 'bg-blue-500 text-underline': 'bg-green-500' }} px-6 py-3 rounded-xl text-white ">Orders</button>
    <button wire:click.prevent="$set('tab','store')" class=" {{ $tab==='store'? 'bg-blue-500': 'bg-green-500' }} px-6 py-3 rounded-xl text-white ">Store info</button>
  </nav>
  <section class="bg-gray-200">
    @if ($tab==='products')
      <livewire:manageproducts/>

    @elseif($tab==='orders')

     <livewire:seller-orders/>
     @elseif($tab==='store')
     <h1>Store info goes here</h1>
    @endif

    



  </section>
</div>
