@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br><br>
            <table class="table table-bordered"  id="myTable">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Operates</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        @if ($users->role == 0)
                            <tr>
                                <td>{{ $users->id }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td><a href="{{ route('deactivateUser', ['id' => $users->id]) }}" class="btn btn btn-xs"
                                        style=" background-color:red;"
                                        onClick="return confirm('Are you sure to deactivate?')">Deactivate</a></td>


                            </tr>
                        @elseif($users->role == 3)
                        <tr>
                            <td>{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td><a href="{{ route('reactivateUser', ['id' => $users->id]) }}" class="btn btn btn-xs"
                                    style=" background-color:grey;"
                                    onClick="return confirm('Are you sure to reactivate?')">Reactivate</a></td>


                        </tr>
                        @else
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <script>
        function searchFunction() {

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("keyword");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>
@endsection
