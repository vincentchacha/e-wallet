@extends('clients.layout')
@section('content')
 <!-- start:form login -->


        <section class="panel panel-default">
                        @if ($message = Session::get('success'))
                            <div class="custom-alerts alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                {!! $message !!}
                            </div>
                            <?php Session::forget('success');?>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="custom-alerts alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                {!! $message !!}
                            </div>
                            <?php Session::forget('error');?>
                            @endif
                            <header class="panel-heading text-center panel-relative">
                                <h3><b>SEND US MESSAGE</b></h3>
                            </header>
                            <div class="panel-body">
                            <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form class="form-horizontal" role="form" method="post" action="{{ route('help') }}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email Address</label>
                                        <div class="col-lg-10">
                                            <input type="email" class="form-control" name="email" id="inputEmail1" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Short Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="title" id="inputPassword1" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Message</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="message" id="inputPassword1" placeholder="Type your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </form>
                    
                                </div>
</div>
                            </div>
                        </section>



@endsection