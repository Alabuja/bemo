<form method="POST" action="{{url('contact')}}" aria-label="Contact Form" id="contactForm">
    @csrf

    <div class="form-group row required">
        <div class="col-md-12">
            <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row required">

        <div class="col-md-12">
            <label for="email" class="col-form-label text-md-right">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row required">
        <div class="col-md-12">
            <label for="description" class="col-form-label text-md-right">{{ __('How Can we Help You?') }}</label>

            <textarea id="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="6" required></textarea>

            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Submit') }}
            </button>
            <button type="button" class="btn btn-success" onclick="resetButton()">
                {{ __('Reset') }}
            </button>
        </div>
    </div>
</form>

@section('js')
<script>
    function resetButton() {
      document.getElementById("contactForm").reset();
    }
</script>
@stop