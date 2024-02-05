<div id="filtr">
    <div class="container-fluid">
        <form method="get" class="row" action="#filtr">
            <div class="col">
                <div class="fake-select fake-select-icon">
                    <i class="las la-door-open"></i>
                    <select name="rooms" id="filtr-rooms">
                        <option value="">Ilość pokoi</option>
                        @foreach($uniqueRooms as $room)
                            <option value="{{ $room }}" @if(request()->input('rooms') == $room) selected @endif>{{ $room }} pokoje</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="fake-select fake-select-icon">
                    <i class="las la-tags"></i>
                    <select name="status" id="filtr-status">
                        <option value="">Status</option>
                        <option value="1" @if(request()->input('status') == 1) selected @endif>Na sprzedaż</option>
                        <option value="2" @if(request()->input('status') == 2) selected @endif>Rezerwacja</option>
                        <option value="3" @if(request()->input('status') == 3) selected @endif>Sprzedane</option>
                    </select>
                </div>
            </div>

            @if($area_range)
                <div class="col">
                    <div class="fake-select fake-select-icon">
                        <i class="las la-expand-arrows-alt"></i>
                        <select name="area" id="filtr-area">
                            <option value="">Powierzchnia</option>
                            {!! area2Select($area_range) !!}
                        </select>
                    </div>
                </div>
            @endif
            <div class="col">
                <button type="submit" id="filtr-button" class="bttn bttn-icon bttn-slow">Szukaj <i class="ms-3 las la-search"></i></button>
            </div>
        </form>
    </div>
</div>
