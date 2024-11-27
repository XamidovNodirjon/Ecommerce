
<script src="{{asset('/admincss/js/toastr.min.js')}}"></script>
<script>

    let sessionSuccess = '{{session('success')}}'
    let sessionError = '{{session('error')}}'
    console.log([sessionSuccess, sessionError])
    if(sessionSuccess){
        toastr.success(sessionSuccess)
    }
    if(sessionError){
        toastr.success(sessionError)
    }
    @if(Session::has('toastr::notifications'))
    @foreach (Session::get('toastr::notifications') as $notification)
    toastr.{{ $notification['type'] }}('{{ $notification['message'] }}');
    @endforeach
    @endif
</script>
<script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
<script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
<script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/admincss/js/charts-home.js')}}"></script>
<script src="{{asset('/admincss/js/front.js')}}"></script>

