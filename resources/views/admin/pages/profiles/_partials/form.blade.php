@include('admin.includes.alerts');

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="nome" class="form-control" placeholder="name" value="{{ $profile->nome ?? old('nome')}}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$profile->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
