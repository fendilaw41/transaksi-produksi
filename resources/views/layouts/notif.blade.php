 @if(session('success'))
 <div class="alert bg-rgba-primary alert-dismissible mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center">
        <i class="bx bx-star"></i>
        <span>
            {{ session('success') }}
        </span>
    </div>
</div>
@endif

@if($errors->any())
 <div class="alert bg-rgba-warning alert-dismissible mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center">
        <i class="bx bx-error"></i>
        @foreach($errors->all() as $error)
        <span>
           {{ $error }}
        </span>
        @endforeach
    </div>
</div>
@endif

