
@include('admin.includes.alerts')

<div class="form-group">
    <label>title:</label>
    <input type="text" name="title" class="form-control" placeholder="name" value="{{ $product->title ?? old('name')}}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="preço" value="{{ $product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label>imagem:</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label>Descrição</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
