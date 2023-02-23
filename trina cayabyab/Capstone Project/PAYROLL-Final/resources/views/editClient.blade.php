@if (session('email') !== NULL)
      @extends('layout.app')
      @section('title')
      EDIT CLIENT | SHOWFORCE SECURITY AGENCY
      @endsection
      @section('links')
        @include('dashboard/links')
      @endsection
      @section('content')
        @foreach ($data1 as $row)
            @foreach ($cdata as $res)
                @include('dashboard/cont15')
                
            @endforeach
            @include('dashboard/footer1')
        @endforeach
      @endsection
      {{-- @section('script')
        @include('dashboard/script')
      @endsection --}}
  @elseif (session('email') == NULL)
    <script type="text/javascript">
        window.location = "login";
    </script>
  @else
    <script type="text/javascript">
        window.location = "login";
    </script>
  @endif
