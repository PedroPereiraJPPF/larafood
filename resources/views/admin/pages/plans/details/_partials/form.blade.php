@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" name="name" class="form-control" value ="{{ $detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>