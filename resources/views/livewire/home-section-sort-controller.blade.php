<div class="container">
    <div>
        <div style="width:100% ;margin-bottom:4rem;">
            <div>
                <div style="display: flex ; flex-diraction:row;justify-content:space-between;align-items:center;">

                    <h2> Home sections</h2>
                    <div>
                        @if (!$showButtons)
                            <button wire:click="showOrder()" class="createBtn" style="border:none;">
                                Edit home sections order
                            </button>
                        @else
                            <button wire:click="showOrder()" class="createBtn" style="border:none;">
                                Delete section
                            </button>
                        @endif
                        <a href="{{ route('homesection.create') }}"   class="createBtn" style="margin-left:2rem;">
                            Add  section
                        </a>
                    </div>
                </div>

               
                <div style="margin-top:2rem">
                    

                    @foreach ($homesections as $homesection)
                    <div style="display:flex;justify-content:space-between;flex-direction=row;border: 1px solid #e0e0eb;padding:1rem;">
                        <div>
                            <h5 style=" text-transform: capitalize;"><b> {{ $homesection->type }} :</b></h5>

                            @if($homesection->type == 'ad')
                                @if ($homesection->merchant_id !== null) 
                                    <p>Merchant name: {{ $homesection->merchants->business_name }}</p>
                                @endif
                                @if ($homesection->offer_id !== null) 
                                    <p>Offer name: {{ $homesection->offers->name }}</p>
                                @endif
                                <img src="{{ asset('storage/'.$homesection->image) }}" style="width: 400px" alt="">
                            @endif

                            @if($homesection->type == 'offers') 
                                <p>Title : {{ $homesection->title }}</p>
                                <p>Offer type: {{ $homesection->offerType->name }}</p>
                            @endif

                            @if($homesection->type == 'merchants') 
                                <p>Title : {{ $homesection->title }}</p>
                                <p>Merchant sub category: {{ $homesection->merchantSubCategory->name }}</p>
                            @endif

                            @if($homesection->type == 'collaboration') 
                                <p>Title : {{ $homesection->title }}</p>
                                <p>Merchant name: {{ $homesection->merchants->business_name }}</p>
                            @endif
                        </div>
                        @if ($showButtons)
                            <div style="display: flex;flex-direction:column;width:fit-content;justify-content:center;">
                                <button wire:click="upOrder({{$homesection->id}})" class="UpBtn"
                                    @if($loop->first) style="background-color: #e2e2e2;color:black;" disabled @endif> 
                                    up
                                </button>
                                <button wire:click="downOrder({{$homesection->id}})" class="DownBtn"
                                    @if($loop->last)style="background-color: #e2e2e2;color:black;" disabled @endif> 
                                    down
                                </button>
                            </div>
                        @else
                        <div style="display: flex;flex-direction:column;width:fit-content;justify-content:center;">
                            <button wire:click="delete({{ $homesection->id }})" class="createBtn" style="border:none;">Delete</button>
                        </div>
                        @endif
                    </div>
                    <div wire:loading wire:target="upOrder({{$homesection->id}})">
                        <div class="popupLoading2">
                            <div class="la-ball-clip-rotate la-dark la-3x">
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div wire:loading wire:target="downOrder({{$homesection->id}})">
                        <div class="popupLoading2">
                            <div class="la-ball-clip-rotate la-dark la-3x">
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div wire:loading wire:target="delete({{$homesection->id}})">
                        <div class="popupLoading2">
                            <div class="la-ball-clip-rotate la-dark la-3x">
                                <div></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
