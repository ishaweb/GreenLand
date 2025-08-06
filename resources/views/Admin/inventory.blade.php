@extends("Admin.partials.Main")
@section("title","Plant")
@section("main")
    <div class="row">
            <div class="col-12">
                <h3 class="fw-bold fs-4 my-3">Product low in stock</h3>
                <table class="table table-striped-columns" id="inventoryTable">
                    <thead>
                        <tr class="highlight">
                            <th scope="col">id</th>
                            <th scope="col">image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i = 1 @endphp
                     @foreach ($plant as $p)
                         <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>
                             <img src="{{ asset('storage/'.$p->image) }}" alt="{{ __('') }}" width="50" height="50">
                            </td>
                            <td>{{$p->Name ?? 'N/A'}}</td>
                            <td>{{$p->quantity ?? 'N/A'}}</td>   
                        </tr>w
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection