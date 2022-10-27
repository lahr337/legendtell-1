{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<main class="page-wrapper">
  <div class="container container--page">

    @include('cars.partials._tabs')

    @include('cars.partials._tab-contents._index')

  </div>

  @include('cars.partials._modals._add-car-modal')
  @include('cars.partials._modals._add-service-record-modal')
  @include('cars.partials._modals._edit-service-record-modal')

</main> 
@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('/assets/css/dashboardReg.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script>
  const carId = "{{ $car ? $car->id : '' }}";
</script>
<script src="{{ asset('/assets/js/dashboardReg.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/servicejq.js') }}" type="text/javascript"></script>
@endsection


