<div style="margin-top: 1rem ;">

    <div style="display: flex;flex-direction:row;align-items:center;margin-left:0.5rem">
        <input type="text" wire:model="code" name="code" class="CreatePostInput" style="width:600px;border:1px solid #858585;border-radius:2rem;margin-right:0.5rem">
        <button wire:click="seeDetails" class="showBtn">See Details</button>
    </div>

    @if($details)
        <div class="RedeemCodeInfo">
            @if($DBBranches->count() > 0)
                <div style="margin-left: 1rem">
                    <p>Client Name :<b> {{ $details->user->name }}</b></p>
                    <p>Offer Name :<b> {{ $details->offer->name }}</b></p>

                    @if($details->offer->product2 !=null)
                        <p>Price :<b> {{ $details->offer->product1->price }}</b></p>
                    @else
                        <p>Price :<b> {{ $details->offer->product1->price - ($details->offer->product1->price * $details->offer->discount)/100 }}</b></p>
                    @endif

                    <p>Offer Type :<b> {{ $details->offer->type->name }}</b></p>
                    <p>Expire Date :<b> {{ $details->expire_date->format('d/m/Y') }}</b></p>
                </div>

                @if($details->branch_id != null)
                    <div style="margin-left: 1rem">
                        <h2 style="color: green">Redeemed</h2>
                        <p style="color: green">Redeem Date :<b> {{ $details->updated_at->format('d/m/Y') }}</b></p>
                    </div>
                @else
                    <select wire:model="branch_id" class="CreatePostInput" style="border-radius:2rem;color: white;background-color:#858585">
                        <option value="" selected>Select Branch :</option>
                        @foreach($DBBranches as $DBBranche)
                            <option value="{{$DBBranche->id}}">{{$DBBranche->city}}</option>
                        @endforeach
                    </select>
                    @if($branch_id != null)
                        <button wire:click="redeemCode" class="createBtn" style="border:none ; border-radius:2rem;">Redeem Code</button>
                    @endif
                @endif
                
            @else
                <h1 style="color:red">Please add branches first</h1>
            @endif
        </div>
    @endif
</div>