@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="card-head container-fluid">
            <div class="row">
                <div class="col-6 pl-0">
                    <h4 class="page-title"><i class="fe-mail"></i><a href="{{ route('admin.crm.inbox.index') }}">Wiadomości</a><span class="d-inline-flex me-2 ms-2">/</span>Wiadomości</h4>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center form-group-submit"></div>
            </div>
        </div>
        @include('admin.crm.client.client_shared.menu')
        <div class="row">
            <div class="col-4">
                @include('admin.crm.client.client_shared.aside')
            </div>
            <div class="col-8">
                <div class="card mt-3">
                    <div class="card-body card-body-rem">
                        <div id="chat">
                            @foreach($chat as $msg)
                            <div class="chat-box d-flex align-items-end float-end mb-4 flex-row-reverse @if($msg->mark_at) chat-mark @endif" data-msg-id="{{$msg->id}}">
                                <div class="chat-avatar">
                                    <div class="avatar">
                                        <span class="avatar-title rounded-circle">{!! mb_substr($client->name, 0, 1) !!}</span>
                                    </div>
                                </div>
                                <div class="chat-text d-flex flex-wrap">
                                    <div class="chat-text-content w-100">
                                        {{ $msg->message }}

                                        @if($msg->notification)
                                        <div class="chat-text-desc">{{ $msg->notification->data['page_name'] }}</div>
                                        @endif
                                    </div>
                                    <div class="chat-text-date w-50 pt-1 ps-2" title="{{ $msg->created_at }}">{{$msg->created_at->diffForHumans()}}</div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                                @foreach($msg->answers as $answer)
                                    <div class="chat-box d-flex align-items-end float-start mb-4">
                                        <div class="chat-avatar">
                                            <div class="avatar">
                                                <span class="avatar-title rounded-circle">{{ $answer->user_id }}</span>
                                            </div>
                                        </div>
                                        <div class="chat-text">
                                            <div class="chat-text-content">
                                                {!! $answer->message !!}
                                            </div>
                                            <div class="chat-text-date pt-1 ps-2" title="{{ $answer->created_at }}">{{$answer->created_at->diffForHumans()}}</div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
