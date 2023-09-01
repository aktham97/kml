<div class="row">
    <div class="col-sm-12">
        @if (count($errors) > 0)
            <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible  show"
                 role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation-1"></i>
                    <span></span>
                </div>
                <div class="m-alert__text">
                    <strong>Please fix theses errors:</strong>
                    <ul>
                        @foreach ($errors->getMessages() as $key=>$error)
                            @if($key != 'not_error')
                                @foreach($error as $e)
                                    <li>{{ $e }}</li>
                                @endforeach

                            @endif

                        @endforeach
                    </ul>
                </div>
            </div>
@endif
    </div>
</div>
