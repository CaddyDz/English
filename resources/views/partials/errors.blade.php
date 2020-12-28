@if (isset($errors))
    @if ($errors->count() > 0)
      @foreach ($errors->all() as $error)
          <script type="text/javascript">
            toastr.error("{{ $error }}");
          </script>
      @endforeach
    @endif
@endif
