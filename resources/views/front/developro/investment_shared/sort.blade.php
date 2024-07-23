<div class="container-fluid">
    <div id="sortList" class="row form-group pt-3 pb-3">
        <div class="col-3">
            <div class="row">
                <div class="col-8">
                    @if($current_locale == 'pl')
                    <select name="sort" id="filtr-sort">
                        <option value="">Domyślne sortowanie</option>
                        <option value="rooms:asc" @if(request()->input('sort') == "rooms:asc") selected @endif>Ilość pokoi: rosnąco</option>
                        <option value="rooms:desc" @if(request()->input('sort') == "rooms:desc") selected @endif>Ilość pokoi: malejąco</option>
                        <option value="area:asc" @if(request()->input('sort') == "area:asc") selected @endif>Powierzchnia: od najmniejszej</option>
                        <option value="area:desc" @if(request()->input('sort') == "area:desc") selected @endif>Powierzchnia: od największej</option>
                    </select>
                    @else
                        <select name="sort" id="filter-sort">
                            <option value="">Default sorting</option>
                            <option value="rooms:asc" @if(request()->input('sort') == "rooms:asc") selected @endif>Number of rooms: ascending</option>
                            <option value="rooms:desc" @if(request()->input('sort') == "rooms:desc") selected @endif>Number of rooms: descending</option>
                            <option value="area:asc" @if(request()->input('sort') == "area:asc") selected @endif>Area: smallest first</option>
                            <option value="area:desc" @if(request()->input('sort') == "area:desc") selected @endif>Area: largest first</option>
                        </select>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-9 d-flex justify-content-end align-items-center d-none">
            <div class="view">
                <span id="grid"><i class="las la-th-large"></i> Siatka</span>
                <span id="list" class="active"><i class="las la-list"></i> Lista</span>
            </div>
        </div>
    </div>

</div>
