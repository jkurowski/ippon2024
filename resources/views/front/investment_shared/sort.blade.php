<div class="container">
    <div id="sortList" class="row form-group pt-3 pb-3">
        <div class="col-12">
            <select name="sort" id="filtr-sort">
                <option value="">Domyślne sortowanie</option>
                <option value="rooms:asc" @if(request()->input('sort') == "rooms:asc") selected @endif>Ilość pokoi: rosnąco</option>
                <option value="rooms:desc" @if(request()->input('sort') == "rooms:desc") selected @endif>Ilość pokoi: malejąco</option>
                <option value="area:asc" @if(request()->input('sort') == "area:asc") selected @endif>Powierzchnia: od najmniejszej</option>
                <option value="area:desc" @if(request()->input('sort') == "area:desc") selected @endif>Powierzchnia: od największej</option>
            </select>
        </div>
    </div>
</div>
