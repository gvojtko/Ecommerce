
				<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				<input type="hidden" name="id" value="{{$produto->id or ''}}"> 
				<div class="form-group">
					<label for="name_product">
						Nome do produto:
					</label>
					<input  value="{{$produto->name_product or old('name_product')}}" name ="name_product" class="form-control input-lg" type="text" placeholder="Nome">
				</div>
				<div class="form-group">

					<input value="{{$produto->valor or old('valor')}}"  name="valor" class="form-control input-lg" type="number" placeholder="Valor">
				</div>
				<div class="form-group">
					<input value="{{$produto->quantidade or old('quantidade') }}"  name="quantidade" class="form-control input-lg" type="number" placeholder="Quantidade">			
				</div>
				<label for="cart_description"></label>
				<textarea name="cart_description"  class="textarea" placeholder="Descrição do carrino (Resumo)..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$produto->descricao or old('descricao')}}</textarea>

				<textarea name="description"  class="textarea" placeholder="Descrição do produto..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$produto->descricao or old('descricao')}}</textarea>
	            
				<div class="form-group">
					<input type="submit" value="Cadastrar" class="btn btn-flat btn-success">
					<button type="buttom" name="" class="btn btn-warning btn-lg pull-right" onclick="window.history.back();">Voltar</button>
				</div>

		