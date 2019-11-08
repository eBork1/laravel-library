@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All books</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table border">
                        <tr>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Availability</td>
                            <td></td>
                        </tr>

                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->checkedout ? "Checked Out": "Available" }}</td>
                            @if (!$book->checkedout)
                            <td>
                                <form action="/home" method="POST" >
                                    {{ csrf_field() }}
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <input type="submit" value="Checkout">

                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection