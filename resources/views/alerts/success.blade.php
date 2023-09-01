<div class="row">
    <div class="col-sm-12">
        @if (session()->has('message'))
            <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible  show"
                 role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation-1"></i>
                    <span></span>
                </div>
                <div class="m-alert__text">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            </div>
        @endif
    </div>
</div>
