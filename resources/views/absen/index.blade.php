@extends('layouts.main')
@section('container')



     
    	{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

        @if (session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>
@endif

@if (count($errors) > 0)

<div class="alert alert-danger d-flex align-items-center" role="alert">

        <div>
             @foreach ($errors->all() as $error)
             <div>
             <i class="fa-solid fa-warning"></i> {{ $error }}
            </div>
             @endforeach
        </div>

</div>
@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
            

        <div class="row">
            <div class="col-lg-12 ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Absen</h4>
                  <!-- Button trigger modal -->
<button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    IMPORT EXCEL
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
     
            <form method="post" action="absen/absen_excel" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <label>Pilih file excel</label>
                        <div>
                            <input type="file" name="file" required="required">
                        </div>
                    </div>
        
     
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </form>
      </div>
    </div>
  </div>
                  



  <button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    CONTOH EXCEL
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contoh Excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                    <div class="modal-body">
                        <img src={{asset('template/assets/img/Screenshota.png')}} class="responsive" style="width: 100%;" >
                    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
                          <th>Pilihan</th>
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
                          <td>
                            <button type="button" class=" badge bg-success border-0" data-id="{{$a->id}}" onclick="edit({{ $a->id}})">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>

                            <form action="/absen/{{ $a->id }}" method="POST" class=" d-inline">
                                @method('delete')
                                @csrf
                                <button class=" badge bg-danger border-0" onclick="return confirm('Are you sure?')"></i>Hapus</button>
                                </form>
                          </td>
                        </tr>
                      
                        
                            @endforeach

                      
                      </tbody>
                    </table>
                  </div>
                </div>

            </div>

                <div class="modal fade" id="editModal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title-edit fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <form method="POST" action="/absensi" id="form-update" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid
                                @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid
                                @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                                @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Masuk</label>
                                <input type="time" class="form-control @error('masuk') is-invalid
                                @enderror" id="masuk" name="masuk" value="{{ old('masuk') }}">
                                @error('masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                      

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Pulang</label>
                                <input type="time" class="form-control @error('pulang') is-invalid
                                @enderror" id="pulang" name="pulang" value="{{ old('pulang') }}">
                                @error('pulang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="alamat" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid
                                @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                           


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
             
           
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
          
      
   
                <script>
                       $(document).ready(function () {
    $('#table-display').DataTable();
});
                      
                                          function edit(id) {
                                              save_method = 'update';
                                              $('#form-update')[0].reset(); // reset form on modals
                                              $('.form-group').removeClass('has-error'); // clear error class
                                              $('.help-block').empty(); // clear error string
                      
                                              //Ajax Load data from ajax
                                              $.ajax({
                                                  url: "/edit-absen/"+id,
                                                  type: "GET",
                                                  dataType: "JSON",
                                                  contentType: false,
                                                  processData: false,
                                                  success: function(data) {
                                                      $('[id="id"]').val(data.id);
                                                      $('[id="nama"]').val(data.nama);
                                                      $('[id="jabatan"]').val(data.jabatan);
                                                      $('[id="masuk"]').val(data.masuk);
                                                      $('[id="pulang"]').val(data.pulang);
                                                      $('[id="tanggal"]').val(data.tanggal);
                                                   
                      
                      
                                                      $('#editModal').modal('show'); // show bootstrap modal when complete loaded
                                                      $('.modal-title-edit').text('Edit Pengguna'); // Set title to Bootstrap modal title
                      
                                                  },
                                                  error: function(jqXHR, textStatus, errorThrown) {
                                                      alert('Error get data from ajax');
                                                  }
                                              });
                                          }
                      
                      
                                      </script>

    
@endsection