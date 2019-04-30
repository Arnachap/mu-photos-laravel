@extends('layouts.admin')

@section('content')
    <h1 class="section-title">Galeries</h1>

    @foreach($categories as $category)
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="4">{{ $category->title }}</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($albums as $album)
                    @if ($album->category == $category->name)
                        <tr>
                            <th scope="row">{{ $album->title }}</th>
                            <td>bla</td>
                            <td>bla</td>
                            <td>bla</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection