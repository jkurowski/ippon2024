<div class="container-fluid">
    <div id="sortList" class="row form-group pt-3 pb-3">
        <div class="col-12 col-md-6 col-xl-3">
            <x-sort-select />
        </div>

        {{-- przelacznik siatka/lista — schowany od dawna (d-none), zostaje --}}
        <div class="col-12 col-xl-9 d-flex justify-content-end align-items-center d-none">
            <div class="view">
                <span id="grid"><i class="las la-th-large"></i> Siatka</span>
                <span id="list" class="active"><i class="las la-list"></i> Lista</span>
            </div>
        </div>
    </div>
</div>
