<div class="CreatePost"> 

    <div class="messageViewTitle">
        <h2 style="margin: 0;">Creating Section</h2> 
        <div class="btnHub">
            <button wire:click="showAd" class="createBtn" @if ($showAd) style="border:none;color: black ; background-color: #AAAAAA;margin-right:0.5rem;" @else style="border:none;margin-right:0.5rem;" @endif>
                Ad
            </button>

            <button wire:click="showMerchants" class="createBtn" @if ($showMerchants) style="border:none;color: black ; background-color: #AAAAAA;margin-right:0.5rem;" @else style="border:none;margin-right:0.5rem;" @endif>
                Merchants
            </button>

            <button wire:click="showOffers" class="createBtn" @if ($showOffers) style="border:none;color: black ; background-color: #AAAAAA;margin-right:0.5rem;" @else style="border:none;margin-right:0.5rem;" @endif>
                Offers
            </button>

            <button wire:click="showCollaboration" class="createBtn" @if ($showCollaboration) style="border:none;color: black ; background-color: #AAAAAA;" @else style="border:none;" @endif>
                Collaboration
            </button>
        </div>
    </div>

    <div class="card-body">

        @if ($showAd)
            <h5><b>Ad</b></h5> 
            <div style="display: flex;flex-direction:row;align-items:center;margin: 0 0 1rem 0">
                <p style="margin: 0 1rem 0 0">Please select your ad type:</p>
                <input wire:click="showMerchantForm" type="radio" id="type" name="type" style="margin-right:0.3rem" value="merchant" checked>
                <label for="merchant" style="margin: 0 1rem 0 0;text-transform: capitalize;">merchant</label>
                <input wire:click="showOfferForm" type="radio" id="type" name="type" style="margin-right:0.3rem" value="offer">
                <label for="offer" style="text-transform: capitalize;">offer</label>
            </div>
                
            @if ($showMerchantForm)
                <form wire:submit.prevent="createMerchantAd">
                    <label for="answer">Merchants:</label>@error('merchantsID') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                    <select name="merchantsID"  wire:model="merchantsID" class="CreatePostInput" aria-label="Default select example">
                        <option selected value={{null}}>{{__('Select one of the merchants')}} : </option>
                        @foreach($merchants as $merchant)
                        <option style="text-transform: capitalize;" value={{$merchant->id}}>{{__($merchant->business_name)}}</option>
                        @endforeach
                    </select>
                    <label for="image">Select image:</label> @error('image') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                    <input type="file" wire:model="image" name="image" id="image" style="margin-bottom: 0.5rem">
                   
                    
                    <span style="color: green;">{{ session()->get('message') }}</span>

                    <input type="submit" value="submit" class="CreatePostBtn" style="margin-top: 2rem"> 
                </form>
            @endif

            @if ($showOfferForm)
                <form wire:submit.prevent="createOfferAd">
                    <label for="answer">Offers:</label>@error('offersID') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                    <select name="offersID" wire:model="offersID" class="CreatePostInput" aria-label="Default select example">
                        <option selected value={{null}}>{{__('Select one of the offers')}} : </option>
                        @foreach($offers as $offer)
                        <option style="text-transform: capitalize;" value={{$offer->id}}>{{__($offer->name)}}</option>
                        @endforeach
                    </select>
                    
                    <label for="pic">Select image:</label> @error('pic') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                    <input type="file" wire:model="pic" name="pic" id="pic" style="margin-bottom: 0.5rem">
                    
                    
                    <span style="color: green;">{{ session()->get('message') }}</span>

                    <input type="submit" value="submit" class="CreatePostBtn" style="margin-top: 2rem"> 
                </form>
            @endif
        @endif

        @if ($showMerchants)
            <h5><b>Merchants</b></h5> 
            <form wire:submit.prevent="createMerchants">
                <label for="question" >Title:</label>@error('titleMerchant') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <input type="text" wire:model="titleMerchant" name="titleMerchant" id="titleMerchant" class="CreatePostInput">

                <label for="category">Merchant category:</label>@error('merchant_category_id') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <select wire:model="merchant_category_id" name="merchant_category_id" class="CreatePostInput" aria-label="Default select example">
                    <option selected value={{null}}>{{__('Category')}} : </option>
                    @foreach($merchant_categories as $category)
                    <option style="text-transform: capitalize;" value={{$category->id}} wire:click="updatedCategoryId">{{__($category->name)}}</option>
                    @endforeach
                </select>

                <label for="subCategory">Merchant sub category:</label>@error('merchant_sub_category_id') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <select wire:model="merchant_sub_category_id" name="merchant_sub_category_id" class="CreatePostInput" aria-label="Default select example">
                    <option selected value={{null}}>{{__('Sub Category')}} : </option>
                    @foreach($merchant_sub_categories as $category)
                    <option style="text-transform: capitalize;" value={{$category->id}}>{{__($category->name)}}</option>
                    @endforeach
                </select>

                <span style="color: green;">{{ session()->get('message') }}</span>
                <input type="submit" value="submit" class="CreatePostBtn" style="margin-top: 2rem"> 
            </form>
        @endif

        @if ($showOffers)
            <h5><b>Offers</b></h5> 
            <form wire:submit.prevent="createOffers">
                <label for="question" >Title:</label>@error('titleOffer') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <input type="text" wire:model="titleOffer" name="titleOffer" id="titleOffer" class="CreatePostInput">

                <label for="answer">Offer type:</label>@error('offer_type_id') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <select wire:model="offer_type_id" name="offer_type_id" class="CreatePostInput" aria-label="Default select example">
                    <option selected value={{null}}>{{__('Type')}} : </option>
                    @foreach($offer_types as $type)
                    <option style="text-transform: capitalize;" value={{$type->id}}>{{__($type->name)}}</option>
                    @endforeach
                </select>
                <span style="color: green;">{{ session()->get('message') }}</span>
                <input type="submit" value="submit" class="CreatePostBtn" style="margin-top: 2rem"> 
            </form>
        @endif

        @if ($showCollaboration)
            <h5><b>Collaboration</b></h5> 
            <form wire:submit.prevent="createCollaboration">
                <label for="question" >Title:</label>@error('titleCollaboration') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <input type="text" wire:model="titleCollaboration" name="titleCollaboration" id="titleCollaboration" class="CreatePostInput">

                <label for="answer">Select one of the merchant for the collaboration:</label>@error('merchantsIDCollaboration') <span class="error" style="color: red">{{ '( '.$message.' )' }}</span> @enderror
                <select name="merchantsIDCollaboration"  wire:model="merchantsIDCollaboration" class="CreatePostInput" aria-label="Default select example">
                    <option selected value={{null}}>{{__('Select one of the merchants')}} : </option>
                    @foreach($merchants as $merchant)
                    <option style="margin-top:0.5rem;text-transform: capitalize;" value={{$merchant->id}}>{{__($merchant->business_name)}}</option>
                    @endforeach
                </select>
                <span style="color: green;">{{ session()->get('message') }}</span>
                <input type="submit" value="submit" class="CreatePostBtn" style="margin-top: 2rem"> 
            </form>
        @endif

        <div wire:loading wire:target="createMerchantAd">
            <div class="popupLoading">
                <div class="la-ball-clip-rotate la-dark la-3x">
                    <div></div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="createOfferAd">
            <div class="popupLoading">
                <div class="la-ball-clip-rotate la-dark la-3x">
                    <div></div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="createMerchants">
            <div class="popupLoading">
                <div class="la-ball-clip-rotate la-dark la-3x">
                    <div></div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="createOffers">
            <div class="popupLoading">
                <div class="la-ball-clip-rotate la-dark la-3x">
                    <div></div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="createCollaboration">
            <div class="popupLoading">
                <div class="la-ball-clip-rotate la-dark la-3x">
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>