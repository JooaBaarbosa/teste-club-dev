@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Produtos</div>
                <div class="card-body">
					<form action="{{route('salvar')}}" method="post" enctype="multipart/form-data">
						<h1 class="text-center">Cadastro de Produtos</h1>
						@csrf
						<div class="form-group">
							<label for="preco">Preço</label>
							<input type="text" class="form-control" id="preco" name="preco" value="{{old('preco')}}">
							@if ($errors->has('preco'))
							<span class="text-danger">{{ $errors->first('preco') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="descricao">Descricao</label>
							<input type="text" class="form-control" id="descricao" name="descricao" value="{{old('descricao')}}">
							@if ($errors->has('descricao'))
							<span class="text-danger">{{ $errors->first('descricao') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="nome">Nome do Produto</label>
							<input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}">
							@if ($errors->has('nome'))
							<span class="text-danger">{{ $errors->first('nome') }}</span>
							@endif
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<input type="file" class="form-control-file" id="image" name="image" accept="image/*">
						</div>
						@if ($errors->has('image'))
						<span class="text-danger">{{ $errors->first('image') }}</span>
						@endif
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script type="text/javascript">
	$("#preco").maskMoney({
		showSymbol: true,
		symbol: "R$",
		decimal: ",",
		thousands: "."
	});
</script>
@endsection
