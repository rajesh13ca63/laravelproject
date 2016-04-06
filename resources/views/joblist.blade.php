@extends('layouts.app')
@section('content')
<div class="container">
    @for ($i = 0; $i< count($product); $i++)
        @if($i % 3 == 0)
            <div class="row">
        @endif
            <div class="col-md-4 form-group">
                <div>
                    <img src="{{ $product[$i]['image'] }}">
                </div>
                <div>
                   <h3> {{ $product[$i]['name'] }} </h3>
                </div>
                <div>
                    <a href="{{ $product[$i]['url'] }}" target="blank" > Click here for more info</a>
                </div>
            </div>
        @if($i % 3 == 2)
            </div>
        @endif
    @endfor
    <div class="col-sm-5"></div>
    <nav>
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1 <span class="sr-only">(current)
          </span></a>
        </li>
        <li class="page-item"><a class="page-link" 
        href="{{ URL::to('getjoblist?page=2&search='.$search )}}">2</a></li>
        <li class="page-item"><a class="page-link" 
        href="{{ URL::to('getjoblist?page=3&search='.$search )}}">3</a></li>
        <li class="page-item"><a class="page-link" 
        href="{{ URL::to('getjoblist?page=4&search='.$search )}}">4</a></li>
        <li class="page-item"><a class="page-link" 
        href="{{ URL::to('getjoblist?page=5&search='.$search )}}">5</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
</div>
@endsection