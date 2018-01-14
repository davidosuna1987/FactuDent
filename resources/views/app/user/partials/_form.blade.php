<form class="form" method="POST" action="{{route('profile.update', $user)}}" role="form">
    {{csrf_field()}}
    {{method_field('PUT')}}

		<h3 class="has-text-primary">Datos personales</h3>

		<div class="columns">
	    <div class="column is-one-third p-b-0">
	    	<div class="field{{ $errors->has('name') ? ' has-error' : '' }}">
	    	    <label for="name" class="label is-small">Nombre <span class="has-text-primary">*</span></label>

	    	    <p class="control has-icons-left">
	    	        <input id="name" type="text" class="input is-small{{ $errors->has('name') ? ' is-danger' : ' is-primary' }}" name="name" value="{{$user->name or old('name')}}">
	    	        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>

	    	        @if($errors->has('name'))
	    	            <p class="help is-danger">{{ $errors->first('name') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>

	    <div class="column is-one-third p-b-0">
	    	<div class="field{{ $errors->has('surnames') ? ' has-error' : '' }}">
	    	    <label for="surnames" class="label is-small">Apellidos</label>

	    	    <p class="control has-icons-left">
	    	        <input id="surnames" type="text" class="input is-small{{ $errors->has('surnames') ? ' is-danger' : ' is-primary' }}" name="surnames" value="{{$user->surnames or old('surnames')}}">
	    	        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>

	    	        @if($errors->has('surnames'))
	    	            <p class="help is-danger">{{ $errors->first('surnames') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>

	    <div class="column is-one-third p-b-0">
	    	<div class="field{{ $errors->has('email') ? ' has-error' : '' }}">
	    	    <label for="email" class="label is-small">Correo electrónico <span class="has-text-primary">*</span></label>

	    	    <p class="control has-icons-left">
	    	        <input id="email" type="email" class="input is-small is-primary" name="email" value="{{$user->email}}" disabled>
	    	        <span class="icon is-small is-left"><i class="fa fa-at"></i></span>
	    	    </p>
	    	</div>
	    </div>
	  </div>

    <div class="columns">
    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('nif') ? ' has-error' : '' }}">
    		    <label for="nif" class="label is-small">NIF <span class="has-text-primary">*</span></label>

    		    <p class="control has-icons-left">
    		        <input id="nif" type="text" class="input is-small{{ $errors->has('nif') ? ' is-danger' : ' is-primary' }}" name="nif" value="{{$user->nif or old('nif')}}">
    		        <span class="icon is-small is-left"><i class="fa fa-id-card-o"></i></span>

    		        @if($errors->has('nif'))
    		            <p class="help is-danger">{{ $errors->first('nif') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>

    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('phone') ? ' has-error' : '' }}">
    		    <label for="phone" class="label is-small">Teléfono</label>

    		    <p class="control has-icons-left">
    		        <input id="phone" type="text" class="input is-small{{ $errors->has('phone') ? ' is-danger' : ' is-primary' }}" name="phone" value="{{$user->phone or old('phone')}}">
    		        <span class="icon is-small is-left"><i class="mdi mdi-phone-classic"></i></span>

    		        @if($errors->has('phone'))
    		            <p class="help is-danger">{{ $errors->first('phone') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>

    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('nickname') ? ' has-error' : '' }}">
    		    <label for="nickname" class="label is-small">Nickname</label>

    		    <p class="control has-icons-left">
    		        <input id="nickname" type="text" class="input is-small{{ $errors->has('nickname') ? ' is-danger' : ' is-primary' }}" name="nickname" value="{{$user->nickname or old('nickname')}}">
    		        <span class="icon is-small is-left"><i class="fa fa-user-circle-o"></i></span>

    		        @if($errors->has('nickname'))
    		            <p class="help is-danger">{{ $errors->first('nickname') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>
    </div>

		<h3 class="has-text-primary">Datos de localización</h3>

		<div class="columns">
			<div class="column">
				<div class="field">
					<label for="autocomplete" class="label is-small">Busca la dirección en Google</label>
					<p class="control has-icons-left">
						<input id="autocomplete" type="text" class="input is-small is-primary" placeholder="Calle de la amargura..." autocomplete="off"></input>
						<span class="icon is-small is-left"><i class="fa fa-globe"></i></span>
					</p>
				</div>
			</div>
		</div>

		<div class="columns">
	    <div class="column is-three-fifths p-b-0">
	    	<div class="field{{ $errors->has('address') ? ' has-error' : '' }}">
	    	    <label for="address" class="label is-small">Dirección <span class="has-text-primary">*</span></label>

	    	    <p class="control has-icons-left">
	    	        <input id="address" type="text" class="input is-small{{ $errors->has('address') ? ' is-danger' : ' is-primary' }}" name="address" value="{{$user->address or old('address')}}">
	    	        <span class="icon is-small is-left"><i class="mdi mdi-map-marker"></i></span>

	    	        @if($errors->has('address'))
	    	            <p class="help is-danger">{{ $errors->first('address') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>

	    <div class="column is-two-fifths p-b-0">
	    	<div class="field{{ $errors->has('locality') ? ' has-error' : '' }}">
	    	    <label for="locality" class="label is-small">Localidad <span class="has-text-primary">*</span></label>

	    	    <p class="control has-icons-left">
	    	        <input id="locality" type="text" class="input is-small{{ $errors->has('locality') ? ' is-danger' : ' is-primary' }}" name="locality" value="{{$user->locality or old('locality')}}">
	    	        <span class="icon is-small is-left"><i class="mdi mdi-map-marker"></i></span>

	    	        @if($errors->has('locality'))
	    	            <p class="help is-danger">{{ $errors->first('locality') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>
	  </div>

    <div class="columns">
    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('province') ? ' has-error' : '' }}">
    		    <label for="province" class="label is-small">Provinica <span class="has-text-primary">*</span></label>

    		    <p class="control has-icons-left">
    		        <input id="province" type="text" class="input is-small{{ $errors->has('province') ? ' is-danger' : ' is-primary' }}" name="province" value="{{$user->province or old('province')}}">
    		        <span class="icon is-small is-left"><i class="mdi mdi-map-marker"></i></span>

    		        @if($errors->has('province'))
    		            <p class="help is-danger">{{ $errors->first('province') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>

    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('country') ? ' has-error' : '' }}">
    		    <label for="country" class="label is-small">País <span class="has-text-primary">*</span></label>

    		    <p class="control has-icons-left">
    		        <input id="country" type="text" class="input is-small{{ $errors->has('country') ? ' is-danger' : ' is-primary' }}" name="country" value="{{$user->country or old('country')}}">
    		        <span class="icon is-small is-left"><i class="mdi mdi-map-marker"></i></span>

    		        @if($errors->has('country'))
    		            <p class="help is-danger">{{ $errors->first('country') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>

    	<div class="column is-one-third">
    		<div class="field{{ $errors->has('post_code') ? ' has-error' : '' }}">
    		    <label for="post_code" class="label is-small">Código postal <span class="has-text-primary">*</span></label>

    		    <p class="control has-icons-left">
    		        <input id="post_code" type="text" class="input is-small{{ $errors->has('post_code') ? ' is-danger' : ' is-primary' }}" name="post_code" value="{{$user->post_code or old('post_code')}}">
    		        <span class="icon is-small is-left"><i class="mdi mdi-map-marker-radius"></i></span>

    		        @if($errors->has('post_code'))
    		            <p class="help is-danger">{{ $errors->first('post_code') }}</p>
    		        @endif
    		    </p>
    		</div>
    	</div>
    </div>

		<h3 class="has-text-primary">Datos de configuración</h3>

		<div class="columns">
	    <div class="column is-three-fifths p-b-0">
	    	<div class="field{{ $errors->has('api_key') ? ' has-error' : '' }}">
	    	    <label for="api_key" class="label is-small">API key</label>

	    	    <p class="control has-icons-left">
	    	        <input id="api_key" type="text" class="input is-small{{ $errors->has('api_key') ? ' is-danger' : ' is-primary' }}" name="api_key" value="{{$user->api_key}}" disabled>
	    	        <span class="icon is-small is-left"><i class="mdi mdi-key"></i></span>

	    	        @if($errors->has('api_key'))
	    	            <p class="help is-danger">{{ $errors->first('api_key') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>

	    <div class="column is-one-fifth p-b-0">
	    	<div class="field">
	    	    <label for="role" class="label is-small">Nivel de usuario</label>

	    	    <p class="control has-icons-left">
	    	        <input id="role" type="text" class="input is-small is-primary" name="role" value="{{$user->role->name}}" disabled>
	    	        <span class="icon is-small is-left"><i class="fa fa-user-secret"></i></span>
	    	    </p>
	    	</div>
	    </div>

	    <div class="column is-one-fifth p-b-0">
	    	<div class="field{{ $errors->has('default_percentage') ? ' has-error' : '' }}">
	    	    <label for="default_percentage" class="label is-small">% por defecto <span class="has-text-primary">*</span></label>

	    	    <p class="control has-icons-left">
	    	        <input id="default_percentage" type="number" class="input is-small{{ $errors->has('default_percentage') ? ' is-danger' : ' is-primary' }}" name="default_percentage" value="{{$user->default_percentage or old('default_percentage')}}">
	    	        <span class="icon is-small is-left"><i class="mdi mdi-percent"></i></span>

	    	        @if($errors->has('default_percentage'))
	    	            <p class="help is-danger">{{ $errors->first('default_percentage') }}</p>
	    	        @endif
	    	    </p>
	    	</div>
	    </div>
	  </div>

		@if(!$user->login_provider)
	    <div class="columns">
	    	<div class="column is-one-third">
	    		<div class="field{{ $errors->has('password') ? ' has-error' : '' }}">
	    		    <label for="password" class="label is-small">Cambiar contraseña</label>

	    		    <p class="control has-icons-left">
	    		        <input id="password" type="password" class="input is-small{{ $errors->has('password') ? ' is-danger' : ' is-primary' }}" name="password">
	    		        <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>

	    		        @if($errors->has('password'))
	    		            <p class="help is-danger">{{ $errors->first('password') }}</p>
	    		        @endif
	    		    </p>
	    		</div>
	    	</div>

	    	<div class="column is-one-third">
	    		<div class="field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	    		    <label for="password_confirmation" class="label is-small">Confirmar cambio de contraseña</label>

	    		    <p class="control has-icons-left">
	    		        <input id="password_confirmation" type="password" class="input is-small{{ $errors->has('password_confirmation') ? ' is-danger' : ' is-primary' }}" name="password_confirmation">
	    		        <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>

	    		        @if($errors->has('password_confirmation'))
	    		            <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
	    		        @endif
	    		    </p>
	    		</div>
	    	</div>
	    </div>
	  @endif

    <div class="control is-pulled-right">
    		<a href="{{route('app.index')}}" class="button m-t-10 m-r-10">Cancelar</a>
        <button type="submit" class="button is-primary m-t-10">Guardar perfil</button>
    </div>
</form>