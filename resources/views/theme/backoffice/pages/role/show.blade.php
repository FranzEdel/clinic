@extends('theme.backoffice.layouts.admin')

@section('title', 'Show')

@section('head')
@endsection

@section('breadcumbs')
	{{-- <li><a href=""></a></li> --}}
	<li><a href="{{ route('backoffice.role.index') }}">Roles del Sistema</a></li>
	<li>{{ $role->name }}</li>
@endsection

@section('content')
	<div class="section">
		<p class="caption"><strong>Rol:</strong> {{ $role->name }}</p>
	    <div class="divider"></div>
	    <div id="basic-form" class="section">
	        <div class="row">
	          	<div class="col s12 m8 offset-m2">
	          		<div class="card">
	          			<div class="card-content">
	              			<span class="card-title">Usuario con el Rol de {{ $role->name }}</span>
               				<p><strong>Slug: </strong>{{ $role->slug }}</p>
               				<p><strong>Descripción: </strong>{{ $role->description }}</p>
	            		</div>
	            		<div class="card-action">
	            			<a href="{{ route('backoffice.role.edit', $role) }}">Editar</a>
	            			<a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a>
	            		</div>	
	          		</div>
	            	
	          	</div>
	        </div>
	    </div>
	</div>
	<form method="post" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
	</form>
@endsection

@section('foot')
	<script>
		function enviar_formulario()
		{
			swal({
				title : "¿Deseas eliminar este Rol?",
				text  : "Esta acción no se puede deshacer",
				type  : "warning",
				showCancelButton : true,
				confirmButtonText : "Si, continuar",
				cancelButtonText  : "No, cancelar",
				closeOnCancel     : false,
				closeOnConfirm    : true
			}).then((result) => {
				if(result.value)
				{
					document.delete_form.submit();
				} else{
					swal(
						'Operacion cancelada',
						'Registro no eliminado',
						'error'
					)
				}
			});
		}
	</script>
@endsection
