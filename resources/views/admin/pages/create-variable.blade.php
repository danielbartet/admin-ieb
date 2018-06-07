@extends('admin.layouts.dashboard')

@section('template_title')
	Create New Variable
@endsection

@section('template_fastload_css')
@endsection

@section('content')
	 <div class="content-wrapper">
	    <section class="content-header">

			<h1>
				Create a New Variable
			</h1>

	    </section>
	    <section class="content">

			@include('admin.partials.return-messages')
			@include('admin.forms.create-variable-form')

	    </section>
	</div>
@endsection

@section('template_scripts')

    @include('admin.structure.dashboard-scripts')
		<script>
			$(document).ready(function() {
				$('#tipo').on('change',function(e){
            console.log(e);
            var tipo = e.target.value;
						if(tipo == 1){
							$('#tipo_bono_wrapper').css("display","block");
						}else{
							$('#tipo_bono_wrapper').css("display","none");
						}
            /*
            $.get('/product_id?brand_id =' + brand_id,{"_token":$("input[name='_token']").val()}, function(data));
            
            $.each(data, function(upload_form, product_cat){
                $('product_category').empty();
                $('product_category').append('<option value="'+ product_cat.id +'">'+ product_cat.product_hierarchy +'</option>');
            });*/
        });
			});
		</script>

@endsection