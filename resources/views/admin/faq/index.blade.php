@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card-head container-fluid">
            <div class="row">
                <div class="col-6 pl-0">
                    <h4 class="page-title"><i class="fe-grid"></i>FAQ</h4>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center form-group-submit">
                    <a href="{{route('admin.faq.create')}}" class="btn btn-primary">Dodaj pytanie</a>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="table-overflow">
                @if (session('success'))
                    <div class="alert alert-success border-0 mb-0">
                        {{ session('success') }}
                        <script>setTimeout(function(){$(".alert").slideUp(500,function(){$(this).remove()})},3000)</script>
                    </div>
                @endif
                <table id="sortable" class="table mb-0">
                    <thead class="thead-default">
                    <tr>
                        <th>Pytanie</th>
                        <th class="text-center">Wersje językowe</th>
                        <th>Data modyfikacji</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="content">
                    @foreach ($list as $item)
                        @php
                            /* Pytania PL i EN to na razie dwa rozne zestawy, wiec czesc
                               wpisow ma wypelniony tylko jeden jezyk — na liscie pokazujemy
                               to, co jest, zeby nie bylo pustych wierszy. */
                            $questionPl = $item->getTranslation('question', 'pl', false);
                            $questionEn = $item->getTranslation('question', 'en', false);
                        @endphp
                        <tr id="recordsArray_{{ $item->id }}">
                            <td>
                                @if($questionPl)
                                    {{ \Illuminate\Support\Str::limit($questionPl, 110) }}
                                @else
                                    <span class="text-muted">{{ \Illuminate\Support\Str::limit($questionEn, 110) }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-{{ $questionPl ? 'success' : 'secondary' }}">PL</span>
                                <span class="badge bg-{{ $questionEn ? 'success' : 'secondary' }}">EN</span>
                            </td>
                            <td>{{ $item->updated_at }}</td>
                            <td class="option-120">
                                <div class="btn-group">
                                    <span class="btn action-button move-button me-1"><i class="fe-move"></i></span>
                                    <a href="{{route('admin.faq.edit', $item->id)}}" class="btn action-button me-1" data-toggle="tooltip" data-placement="top" title="Edytuj wpis"><i class="fe-edit"></i></a>
                                    <form method="POST" action="{{route('admin.faq.destroy', $item->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button
                                                type="submit"
                                                class="btn action-button confirm"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Usuń wpis"
                                                data-id="{{ $item->id }}"
                                        ><i class="fe-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group form-group-submit">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('admin.faq.create')}}" class="btn btn-primary">Dodaj pytanie</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">$(document).ready(function(){$("#sortable tbody.content").sortuj('{{route('admin.faq.sort')}}');});</script>
@endpush
