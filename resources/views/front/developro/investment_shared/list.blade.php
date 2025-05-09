<div id="roomsList">
    <div class="container-fluid">
        @if($properties->count() > 0)
            @foreach($properties as $room)

                <div class="row property-list-item">
                    @if($room->highlighted)
                    <div class="ribbon ribbon-top-left"><span>PROMOCJA</span></div>
                    @endif
                    <div class="col-12 col-lg-2">
                            <picture>
                                <source type="image/webp" srcset="/investment/property/list/webp/{{$room->file_webp}}">
                                <source type="image/jpeg" srcset="/investment/property/list/{{$room->file}}">
                                <img src="/investment/property/list/{{$room->file}}" alt="@if($current_locale == 'pl') Mieszkanie {{$room->number}} @else Apartment {{$room->number}} @endif">
                            </picture>
                    </div>

                    <div class="col-12 col-lg-8 d-flex align-items-center ps-3 ps-lg-4">
                        <div class="row w-auto w-lg-100">
                            <div class="col-12">
                                <h2 class="poppins">
                                    @if($current_locale == 'pl') Mieszkanie {{$room->number}} @else Apartment {{$room->number}} @endif
                                </h2>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 @if($room->additional) col-lg-6 @endif">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 property-list-item-stat mb-3 mb-lg-0">
                                                <img src="{{ asset('/images/floor-icon.svg') }}" alt="Ikonka piętra" class="me-3"> @lang('website.select-option-floor') {{ isset($room->floor_number) ? $room->floor_number : $room->floor->number }}
                                            </div>
                                            <div class="col-12 col-sm-4 property-list-item-stat mb-3 mb-lg-0">
                                                <img src="{{ asset('/images/room-icon.svg') }}" alt="Ikonka pokoi" class="me-3"> {{$room->rooms}}
                                                @if ($room->rooms == 1)
                                                    @lang('website.room')
                                                @else
                                                    @lang('website.rooms')
                                                @endif
                                            </div>
                                            <div class="col-12 col-sm-4 property-list-item-stat">
                                                <img src="{{ asset('/images/area-icon.svg') }}" alt="Ikonka powierzchni" class="me-3"> {{$room->area}} m<sup>2</sup>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        @if($room->additional)
                                        @php
                                            $atutyArray = json_decode($room->additional);
                                        @endphp

                                        <div class="property-list-item-option">
                                            @for($i = 1; $i <= 6; $i++)
                                                @if(in_array($i, $atutyArray))
                                                    <span class="option-{{ $i }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ toolTip($i) }}"></span>
                                                @endif
                                            @endfor
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 d-flex align-items-center">
                        {!! roomStatusBadge($room->status) !!}
                        @if(Route::currentRouteName() === 'clipboard.index')
                            <button id="addToFav" class="bttn mt-3" data-id="{{$room->id}}"><i class="lar la-trash-alt me-3"></i> USUŃ ZE SCHOWKA</button>
                        @else
                        <a href="{{ route('developro.property', [$investment->slug, $room, Str::slug($room->name), floorLevel($room->floor_number, true), number2RoomsName($room->rooms, true), round(floatval($room->area), 2).'-m2']) }}" class="bttn bttn-icon">@lang('website.show-room') <i class="ms-4 las la-file"></i></a>
                        @endif
                    </div>
                    @if($room->attributes_bg && $room->attributes_text && $room->attributes_content)
                        <div class="attributes mt-4">
                            <div style="background:{{ $room->attributes_bg }}; color:{{ $room->attributes_text }};">
                                <span>{{ $room->attributes_content }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <b>Brak wyników</b>
                </div>
            </div>
        @endif
    </div>
</div>
@push('scripts')
    <script>
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endpush