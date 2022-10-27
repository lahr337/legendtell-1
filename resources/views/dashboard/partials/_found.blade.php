<div class="found-results">
    @if($cars)
        {{-- <span class="found-results__title">{{$cars->count()}} result was found</span> --}}
             {{-- <span class="found-results__title">Result was found</span> --}}
        <div class="found-results__items">
        {{-- @foreach($cars as $car) --}}
            @php($appraisal = $cars->appraisal ?? new App\Models\CarAppraisal)
            <article class="found-results__item result-card">
                <div class="result-card__img-side">
                <picture class="result-card__img-wr"
                    >
                    @if($cars->userData)

                    <img class="result-card__img" src="{{$cars->userData->shop_photo ? $cars->userData->shop_photo :'shop_photo.png' }}" alt="alt" loading="lazy"/>
                    @else
                    <img class="result-card__img" src="/shop_photo.png" alt="alt" loading="lazy"/>
                    @endif
            </picture>
                </div>
               
                <div class="result-card__content-side">
                <h3 class="result-card__title">{{$cars->title ?? ''}}</h3>
                <ul class="result-card__props-list list list--props">
                    @if($cars->userData)

                    <li class="list__item">
                    <span class="list__item-prop">Shop Name</span
                    ><span class="list__item-val">{{ucwords($cars->userData->shop_name ?? '')}}</span>
                    </li>
                    @else
                    <li class="list__item">
                        <span class="list__item-prop">Year</span
                        ><span class="list__item-val">{{ucwords($cars->year ?? '')}}</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Make</span
                            ><span class="list__item-val">{{ucwords($cars->make ?? '')}}</span>
                        </li>
                        <li class="list__item">
                            <span class="list__item-prop">Model</span
                            ><span class="list__item-val">{{ucwords($cars->model ?? '')}}</span>
                        </li>
                    @endif
                    {{-- <li class="list__item">
                    <span class="list__item-prop">Miles</span
                    ><span class="list__item-val">{{$appraisal->mileage}}</span>
                    </li>
                    <li class="list__item">
                    <span class="list__item-prop">Location</span
                    ><span class="list__item-val">{{$car->location}}</span>
                    </li>
                    <li class="list__item">
                    <span class="list__item-prop">Color</span
                    ><span class="list__item-val">{{$appraisal->color}}</span>
                    </li>
                    <li class="list__item">
                    <span class="list__item-prop">Status</span
                    ><span class="list__item-val">PRIVATE OWNER</span>
                    </li> --}}
                </ul>
                @if($cars->userData)
                <button  class="result-card__link-to-card btn btn--accent btn--full-width vistdashboard" id="{{$cars->id}}">Visit Vehicle Page</button>
                <button  class="result-card__link-to-card btn btn--accent btn--full-width vistdashboard" id="{{$cars->id}}">Buy Report</button>
                {{-- <a class="result-card__link-to-card btn btn--accent btn--full-width"
                    href="{{route('account-settings.index',['vindashboard',$cars->id])}}"
                    >Visit Vehicle Page</a>
                <a class="result-card__link-to-card  btn btn--accent btn--full-width"
                    href="{{route('payment.index',$cars->id)}}" >Buy Report</a> --}}
                @else
                <a class="result-card__link-to-card btn btn--accent btn--full-width" href="#">Visit Vehicle Page</a >
                @endif
                </div>
            </article>
        {{-- @endforeach --}}
        </div>
    @else
        <span class="found-results__title">Result was not found</span>
    @endif
</div>
