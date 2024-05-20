@extends('layout.layout')
{{--  this @extends('layout.layout') fetch all data from layout.layout to this page   --}}

@section('content')
    {{-- ______________________________________________________________________________________________________________
          this @section('content') ... @endsection
          gives the billow content a name that we can use to put this Section where we want in Layout.Layout

    ************************ IMP ************************
          layout.layout have both
          HEADER & FOOTER

          We want our content between them so we use this
          ______________________________________
          |  @section('content') ... @endsection |
          |======================================|

          to move this part whereever we want !!!

    ************************ IMP ************************
          inside layout.layout.blade.php       =======>        we use   @yield('content') to yield this content.
    _______________________________________________________________________________________________________________ --}}

    <div class="row">

        <div class="col-10 offset-1">

            @include('shaired.success-message')
            @include('shaired.error-message')
            {{--  ********************  @include('shaired.success-message') ===> moves success message to the page when it needed. ******************** --}}
            {{-- @include('shaired.submit-idea') --}}
            {{--  ********************  @include('shaired.submit-idea') ===> moves TEXTAREA to add idea in dashboard. ******************** --}}
            <hr>

            {{-- -------------------------------------- --}}
            {{-- @foreach ($ideas as $idea) --}}
                <div class="mt-3">
                    @include('shaired.idea-card')
                    {{-- THis inclused the idea-card data inside hear. --}}
                </div>

                {{--
                ____________________________________________________________________________________
                ******************** @foreach ($ideas as $idea) ...@endforeach  ********************

                is a loop that prints all the ideas inside this DIV....
                hear we includes
                                  @include('shaired.idea-card')

                in which We have
                                  {{ $idea->content }}
                                  {{ $idea->likes }}
                                  {{ $idea->created_at }}
                ALL
                of
                which is fetched from databace and looped with above loop and then DATA is added...
                _____________________________________________________________________________________
                --}}
            {{-- @endforeach --}}
            {{-- -------------------------------------- --}}



            <div class="div mt-3">
                {{-- {{ $ideas->links() }} --}}
                {{-- this is hear for the pagination purpoose !!! --}}
            </div>
        </div>

    </div>
@endsection
