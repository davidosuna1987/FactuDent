@extends('layouts.app')

@section('title', '| Ajustes de '.$user->fullName())

@section('content')

	<div class="columns">
		<div class="column">
			<a href="{{route('app.index')}}" class="button is-pulled-right">Volver</a>
			<div class="title">Editar ajustes</div>
			<hr>
		</div>
	</div>

	<div class="columns">
		<div class="column">

			<form class="form" method="POST" action="{{route('settings.update', $user)}}" role="form">
			    {{csrf_field()}}
			    {{method_field('PUT')}}

					<h3 class="has-text-primary">Ajustes PDF</h3>

					<div class="columns">
				    <div class="column is-one-fifth p-b-0">
				    	<div class="field">
				    	    <label for="pdf-color" class="label is-small">Color secundario (títulos)</label>

				    	    <p class="control has-icons-left color-picker-wrapper" data-tooltip="Haz click para cambiar el color">
				    	        <input id="pdf-color" type="text" class="input is-primary is-small" name="pdf_color" value="{{$user->pdf_color or old('pdf-color')}}">
				    	        <span class="icon is-small is-left"><i class="mdi mdi-palette"></i></span>
				    	        <span id="color-picker" class="tooltip" data-tooltip="Haz click para elegir un color" style="color:{{$user->pdf_color}}"><i class="mdi mdi-palette"></i></span>
				    	    </p>
				    	</div>
				    </div>
				  </div>

				  <div class="columns">
				  	<div class="column">
				  		<label for="show-logo" class="switcher">
				  			<span class="switcher-title label is-small m-t-15">Mostrar logo</span>
					  		<span class="switcher-wrapper">
					  			<input id="show-logo" name="show_logo" type="checkbox" {{$user->show_logo ? 'checked' : ''}}>
									<span class="switcher-controls">
										<span class="switcher-true">Sí</span>
										<span class="switcher-limit"></span>
										<span class="switcher-false">No</span>
									</span>
								</span>
							</label>
				  	</div>
				  </div>

			    <div class="control is-pulled-right">
			    		<a href="{{route('app.index')}}" class="button m-t-10 m-r-10">Cancelar</a>
			        <button type="submit" class="button is-primary m-t-10">Guardar ajustes</button>
			    </div>
			</form>

		</div>
	</div>

@endsection

@push('scripts')
	@include('partials.scripts.colpick')

	<script>
		jQuery(document).ready(function($) {

			$('#pdf-color').click(function(e) {
				$(this).blur();
				$('#color-picker').click();
			});

			var previous_colorpicker_color = '{{$user->pdf_color}}';

			$('#color-picker').colpick({
				layout:'hex',
				submit:0,
				color: '{{$user->pdf_color}}',
				onChange:function(hsb,hex,rgb,el,bySetColor) {
					if((rgb.r > 240) && (rgb.g > 240) && (rgb.b > 240)){
						var colorpicker_color = '#f8f8f8';
					}else{
						var colorpicker_color = '#'+hex;
					}
					$('#color-picker').css('color', colorpicker_color);
				},
				onSubmit:function(hsb,hex,rgb,el,bySetColor){
					$('#pdf-color').val('#'+hex);
					if((rgb.r > 240) && (rgb.g > 240) && (rgb.b > 240)){
						var colorpicker_color = '#f8f8f8';
						previous_colorpicker_color = '#f8f8f8';
					}else{
						var colorpicker_color = '#'+hex;
						previous_colorpicker_color = '#'+hex;
					}
					$('#color-picker').css('color', colorpicker_color);
					$('.colpick_hex').hide();
				},
				onHide:function(hsb,hex,rgb,el,bySetColor){
					$('#color-picker').css('color', previous_colorpicker_color);
				}
			});

		});
	</script>
@endpush