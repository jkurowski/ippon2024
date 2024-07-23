<div id="filtr">
    <div class="container">

        @if(isset($title))
        <div class="row">
            <div class="col-12">
                <h2>{{ $title }}</h2>
            </div>
        </div>
        @endif

        <form method="get" class="row" action="@if(isset($route)) {{ route($route['name'], $route['params']) }}#filtr @else #filtr @endif">
            <div class="col-12 col-sm">
                <label for="filtr-rooms" class="w-100">@lang('website.select-option-rooms')</label>
                <select name="rooms" id="filtr-rooms">
                    <option value="">@lang('website.filtr-all')</option>
                    @if($uniqueRooms)
                        @foreach($uniqueRooms as $room)
                            <option value="{{ $room }}" @if(request()->input('rooms') == $room) selected @endif>{{ $room }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-12 col-sm">
                <label for="filtr-status" class="w-100">Status</label>
                <select name="status" id="filtr-status">
                    <option value="">@lang('website.filtr-all')</option>
                    <option value="1" @if(request()->input('status') == 1) selected @endif>@lang('website.property-status-1')</option>
                    <option value="2" @if(request()->input('status') == 2) selected @endif>@lang('website.property-status-2')</option>
                    <option value="3" @if(request()->input('status') == 3) selected @endif>@lang('website.property-status-3')</option>
                </select>
            </div>

            @if($area_range)
                <div class="col-12 col-sm">
                    <label for="filtr-area" class="w-100">@lang('website.area')</label>
                    <select name="area" id="filtr-area">
                        <option value="">@lang('website.filtr-all')</option>
                        {!! area2Select($area_range) !!}
                    </select>
                </div>
            @endif
            <div class="col-12 col-sm">
                <label for="filtr-button" class="w-100">&nbsp;</label>
                <button type="submit" id="filtr-button" class="bttn bttn-center bttn-sm w-100">@lang('website.button-search')</button>
            </div>
        </form>
    </div>
</div>
