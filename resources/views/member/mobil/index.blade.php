@extends('member.master')
@section('content')
@include('member.partials.nav')
<section class="features-top-area" id="features">
<div class="container">
            <div class="row promo-content">
<div class="container">
                <div class="col-sm-14">
                   <h3>Catalog Mobil</h3>
            <a class="btn btn-primary" href="{{ route('mobils.create') }}"><i class="fa fa-plus-square"></i> Tambah</a>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <input type="search" name="search" id="myInput" onkeyup="myFunction()" placeholder=" Search fo title.." style="width: 200px;height: 35px">
              <br>
              <br>
                <div class="table-responsive">
                  <table class="table" id="myTable">
                    <thead class=" text-primary">
                      <th>Nomer</th>
                      <th>Gambar</th>
                      <th>Nama Mobil</th>
                      <th>Merk Mobil</th>
                      <th>Model Mobil</th>
                      <th>Nama Penjual</th>
                      <th>Lokasi</th>
                      <th>No hp</th>
                      <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                                <?php $nomor = 1; ?>
                        @php $no = 1; @endphp
                        @foreach($mobil as $data)
                                <tr>
                                  <td>{{ $no++ }}</td>
                                  <td><img src="{{asset('/img/'.$data->gambar.'')}} " width="70" height="70"></td>
                                  <td>{{ $data->nama }}</td>
                                  <td>{{ $data->Merk->nama }}</td>
                                  <td>{{ $data->model }}</td>
                                  <td>{{ Auth::user()->name }}</td>
                                  <td>{{ $data->lokasi }}</td>
                                  <td>0{{ $data->no_hp }}</td>

                        <td>
                            <a class="btn btn-warning" href="{{ route('mobils.edit',$data->id) }}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('mobils.destroy',$data->id) }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">

                        <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                      
                                </tr>
                                @endforeach
                    </tbody>
                  </table>
                      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

<!-- -------------------------------------------Mobil create------------------------------------------------------------------ -->