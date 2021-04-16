@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        
                      <table class = "table">
                          <thead>
                              <tr>
                                  <th> ID </th>
                                  <th> Name </th>
                                  <th> Email </th>
                                  <th> </th>
                              </tr>
                              <tbody>

                                @foreach ($users as $users)

                                <tr>
                                    <td> {{ $users->id }} </td>
                                    <td> {{ $users->name }} </td>
                                    <td> {{ $users->email }} </td>
                                    <td> <a href="/users/{{$users->id}}"> View </a> </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.footer')


@endsection


@section('scripts')

<script>
    var app = @json($users);
    console.log(app);

</script>

@endsection