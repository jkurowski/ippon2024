<div id="filtr">
    <div class="container-fluid">
        <form method="get" class="row" action="#filtr">
            @if($floorFiltr || $floors == '0' )
                <div class="col-12 col-lg">
                    <div class="fake-select fake-select-icon">
                        <i class="las la-layer-group"></i>
                        <select name="floor" id="filtr-rooms">
                            <option value="">@lang('website.select-option-floor')</option>
                            <option value="1" @if(request()->input('floor') == '1') selected @endif>@lang('website.select-option-floor-1')</option>
                            <option value="2" @if(request()->input('floor') == '2') selected @endif>@lang('website.select-option-floor-2')</option>
                            <option value="3" @if(request()->input('floor') == '3') selected @endif>3 pietro</option>
                            <option value="4" @if(request()->input('floor') == '4') selected @endif>4 pietro</option>
                            <option value="5" @if(request()->input('floor') == '5') selected @endif>5 pietro</option>
                        </select>
                    </div>
                </div>
            @endif

            <div class="col-12 col-lg">
                <div class="fake-select fake-select-icon">
                    <i class="las la-door-open"></i>
                    <select name="rooms" id="filtr-rooms">
                        <option value="">@lang('website.select-option-rooms')</option>
                        @foreach($uniqueRooms as $room)
                            <option value="{{ $room }}" @if(request()->input('rooms') == $room) selected @endif>{{ $room }} pokoje</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg">
                <div class="fake-select fake-select-icon">
                    <i class="las la-tags"></i>
                    <select name="status" id="filtr-status">
                        <option value="">Status</option>
                        <option value="1" @if(request()->input('status') == 1) selected @endif>@lang('website.property-status-1')</option>
                        <option value="2" @if(request()->input('status') == 2) selected @endif>@lang('website.property-status-2')</option>
                        <option value="3" @if(request()->input('status') == 3) selected @endif>@lang('website.property-status-3')</option>
                    </select>
                </div>
            </div>

            @if($area_range)
                <div class="col-12 col-lg">
                    <div class="fake-select fake-select-icon">
                        <i class="las la-expand-arrows-alt"></i>
                        <select name="area" id="filtr-area">
                            <option value="">@lang('website.property-area')</option>
                            {!! area2Select($area_range) !!}
                        </select>
                    </div>
                </div>
            @endif
            <div class="col-12 col-lg">
                <button type="submit" id="filtr-button" class="bttn bttn-icon bttn-slow">@lang('website.button-search') <i class="ms-3 las la-search"></i></button>
            </div>
        </form>
    </div>
</div>
