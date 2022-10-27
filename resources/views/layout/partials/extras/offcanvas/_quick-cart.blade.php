@php
	$direction = config('layout.extras.quick-cart.offcanvas.direction', 'right');
@endphp
{{-- Quick Cart --}}
<div id="kt_quick_cart_{{$drawer_name}}" class="offcanvas offcanvas-{{ $direction }} p-10">
	
	{{-- Quick Cart Header --}}
	<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7" kt-hidden-height="46" style="">
		<h4 class="font-weight-bold m-0">{{ucwords(str_replace('_',' ', $drawer_name))}}</h4>
		<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_{{$drawer_name}}_close">
			<i class="ki ki-close icon-xs text-muted"></i>
		</a>
	</div>

	{{-- Quick Cart Content --}}
	<div class="offcanvas-content">
		<!--begin::Wrapper-->
		<div class="offcanvas-wrapper mb-5 scroll-pull scroll ps ps--active-y" style="height: 399px; overflow: hidden;">
			<div id="kt_quick_cart_{{$drawer_name}}_loader" style="text-align: center;">
				<img src="{{ asset('media/loader.gif') }}" style="width:70%;" />
			</div>
			<form id="kt_quick_cart_{{$drawer_name}}_form" class="form">
				<div class="offcanvas-container" id="kt_quick_cart_{{$drawer_name}}_container">
					
				</div>
			</form>
			<!--begin::Item-->
			<div class="d-flex align-items-center justify-content-between py-8">
				<form id="kt_quick_cart_{{$drawer_name}}_add_form" class="form fv-plugins-bootstrap fv-plugins-framework kt_quick_cart_x_add_form" novalidate="novalidate">
					<div class="d-flex flex-column mr-2" id="kt_quick_cart_{{$drawer_name}}_input_container">
					</div>
				</form>
				<a href="#" class="symbol symbol-70 flex-shrink-0 btn btn-xs btn-light-success btn-icon mr-2" id="kt_quick_cart_{{$drawer_name}}_add_btn" style="pointer-events: none;">
					<i class="ki ki-plus icon-xs"></i>
				</a>
			</div>
		<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 399px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 250px;"></div></div></div>
		<!--end::Wrapper-->
		<!--begin::Purchase-->
		<div class="offcanvas-footer" kt-hidden-height="112" style="">
			<div class="text-right">
				<button type="button" id="kt_quick_cart_{{$drawer_name}}_btn_save" class="btn btn-primary text-weight-bold">Save</button>
			</div>
		</div>
		<!--end::Purchase-->
	</div>
</div>
