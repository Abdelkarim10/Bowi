
<div>
    <select wire:model="categoryId" name="merchant_category_id" class="form-select selectInput" aria-label="Default select example">
        <option selected value="">{{__('Category')}} : </option>
        @foreach($categories as $category)
        <option value={{$category->id}}>{{__($category->name)}}</option>
        @endforeach
    </select>

    <select name="merchant_sub_category_id" class="form-select selectInput" aria-label="Default select example">
        <option selected disabled value="">{{__('Sub Category')}} : ({{__('Select category first')}}) </option>
        @if($subCategories != null)
            @foreach($subCategories as $subCategory)
            <option value={{$subCategory->id}}>{{__($subCategory->name)}}</option>
            @endforeach
        @else
            <option disabled value="">{{__('No subcategories')}} </option>
        @endif
    </select>

    <select wire:model="hearAboutUs" name="hear_about_us" class="form-select selectInput" aria-label="Default select example">
        <option selected value="">{{__('How did you hear about us ')}}? </option>
        <option value="Influencer">Influencer</option>
        <option value="Social Media">Social Media</option>
        <option value="SMS">SMS</option>
        <option value="Linkedin">Linkedin</option>
        <option value="Others">Others</option>
    </select>

    @if($hearAboutUs == 'Others')
        <input class="textInput" required name="others" type="text" placeholder="{{__('Write it here')}}">
    @endif
</div>