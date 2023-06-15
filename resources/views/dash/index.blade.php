@extends('layouts.main')
@section('container')
    


     

<div class="row">
            <div class="col-lg-12 ">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Data Absen</h2>
                  <!-- Button trigger modal -->     
                  <div class="row">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-display">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Masuk</th>
                          <th>Pulang</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($absen as $a)
                            
                       
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$a->nama}}</td>
                          <td>{{$a->jabatan}}</td>
                          <td>{{$a->masuk}}</td>
                          <td>{{$a->pulang}}</td>
                          <td>{{$a->tanggal}}</td>
                        </tr>
                        @endforeach
                      
                      
                      </tbody>
                    </table>
                  </div>
                </div>
             
            </div>
          </div>
             
        </div>




        <div class="row">

            <div class="card mt-5">
                <div class="card-body">
                  <h2 class="card-title">Data Karyawan</h2>
                  <!-- Button trigger modal -->     
              
<div class="row">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-display2">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Domisili</th>
                          <th>Jabatan</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($karyawan as $a)
                            
                       
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$a->nama}}</td>
                          <td>{{$a->tanggal_lahir}}</td>
                          <td>{{$a->alamat}}</td>
                          <td>{{$a->domisili}}</td>
                          <td>{{$a->jabatan}}</td>
                        </tr>
                        @endforeach
                        
                      
                      </tbody>
                    </table>
                  </div>
                </div>
             
            </div>
            </div>
           
          
          </div>
             
        </div>
   
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

<script>
                $(document).ready(function () {
    $('#table-display').DataTable();
});



          
</script>

<script>
  $(document).ready(function () {
    $('#table-display2').DataTable();
});
</script>
    
@endsection