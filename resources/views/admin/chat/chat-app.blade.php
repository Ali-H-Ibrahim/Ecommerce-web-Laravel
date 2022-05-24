@extends('admin.layouts.adminDashboardLayouts.admin_layouts')

@section('title','Chat | All Messages')

@section('admin_content')
    <!--################## Start Users List Section ##################-->
    <div class="vertical-layout vertical-menu-modern content-left-sidebar chat-application  menu-expanded fixed-navbar">
        <div class="app-content content">
            <div class="sidebar-left sidebar-fixed">
                <div class="sidebar">
                    <div class="sidebar-content card d-none d-lg-block">

                        <!--############### Search ##############-->
                        <div class="card-body chat-fixed-search">
                            <fieldset class="form-group position-relative has-icon-left m-0">
                                <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
                                <div class="form-control-position">
                                    <i class="ft-search"></i>
                                </div>
                            </fieldset>
                        </div>

                        <!--############### Users ##############-->
                        <div id="users-list" class="list-group position-relative">
                            <div class="users-list-padding media-list">
                            @foreach(custom() as $cust )

                                <!--############### 1 ##############-->
                                <a class="media border-0"  >
                                    <div class="media-left pr-1 usertese"  user_id="{{$cust->id}}">
                                      <span class="avatar avatar-md avatar-online">
                                        <img class="media-object rounded-circle"
                                             src="{{ asset($cust->image)}}"
                                             >
                                        <i></i>
                                      </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading">
                                            {{$cust-> first_name}} {{$cust->last_name}}

                                            <span class="font-small-3 float-right info">4:14 AM</span>
                                        </h6>
                                        <p class="list-group-item-text text-muted mb-0">
                                            <i class="ft-check primary font-small-2"></i>
                                            Okay
                                            <span class="float-right primary">
                                            <span class="badge badge-pill badge-danger">12</span>
                                        </span>
                                        </p>
                                    </div>
                                </a>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################## End Users List Section ##################-->


            <!--################## Start Messages Section ##################-->
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>


                    <div class="content-body">
                        <section class="chat-app-window">
                            <div class="badge badge-default mb-1">Chat History</div>
                            <div class="chats ">

                                <div class="chats chat-content1" id="chat-content">


                                    <div class="chat chat-left">
                                        <div class="chat-avatar">
                                            <a class="avatar" data-toggle="tooltip"
                                               href="#" data-placement="left"
                                               title="" data-original-title="">
                                                <img src="{{ asset('backend/img/avatars/avatar2.jpeg') }}"
                                                     alt="avatar"/>
                                            </a>
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Hey John, I am looking for the best admin template.</p>
                                                <p>Could you please help me to find it out?</p>
                                            </div>
                                            <div class="chat-content">
                                                <p>It should be Bootstrap 4 compatible.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="chat">
                                        <div class="chat-avatar">
                                            <a class="avatar" data-toggle="tooltip"
                                               href="#" data-placement="right"
                                               title="" data-original-title="">
                                                <img src="{{ asset('backend/img/avatars/avatar1.jpeg') }}"
                                                     alt="avatar"/>
                                            </a>
                                        </div>
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Absolutely!</p>
                                            </div>
                                            <div class="chat-content">
                                                <p>Ashraf is talking now.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="time">1 hours ago</p>

                                </div>

                            </div>

                        </section>

                        <section class="chat-app-form">
                            <form class="chat-app-input d-flex">
                                <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                    <div class="form-control-position">
                                        <i class="icon-emoticon-smile"></i>
                                    </div>
                                    <input type="text" class="form-control" id="adminmessage"
                                           placeholder="Type your message">
                                    <div class="form-control-position control-position-right">
                                        <i class="ft-image"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                                    <button type="button" class="btn btn-info"><i
                                            class="la la-paper-plane-o d-lg-none"></i>
                                        <span class="d-none d-lg-block send-message-admin">Send</span>
                                    </button>
                                </fieldset>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection
