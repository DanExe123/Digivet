<div>
    @if($status === 'cancelled')
        <button class="flex items-center w-20 bg-gray-500 text-white rounded px-2 py-1 cursor-default" disabled>
            <i class="fas fa-times mr-2"></i> Cancelled
        </button>
    @else
        <button 
            wire:click="cancel"
            class="flex items-center w-20 bg-red-500 text-white rounded px-2 py-1 cursor-pointer hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
            <i class="fas fa-times mr-2"></i> Cancel
        </button>
    @endif
</div>
