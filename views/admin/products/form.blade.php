<div class="mb-3">
    <label>SKU</label>
    <input type="text" name="sku" class="form-control" value="{{ $product->sku ?? old('sku') }}">
</div>
<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $product->name ?? old('name') }}">
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="mb-3">
    <label>Price</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price ?? old('price') }}">
</div>
<div class="mb-3">
    <label>Image Filename</label>
    <input type="text" name="image_url" class="form-control" value="{{ $product->image_url ?? old('image_url') }}">
</div>
<button type="submit" class="btn btn-primary">Save</button>
