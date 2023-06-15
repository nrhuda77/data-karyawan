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
                  <h4 class="card-title">Data Karyawan</h4>
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
     
            <form method="post" action="karyawan/karyawan_excel" enctype="multipart/form-data">
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
                        <img src={{asset('template/assets/img/Screenshotb.png')}} class="responsive" style="width: 100%;" >
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
                          <th>Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Domisili</th>
                          <th>Jabatan</th>
                          <th>Pilihan</th>
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
                          <td>
                            <button type="button" class=" badge bg-success border-0" data-id="{{$a->id}}" onclick="edit({{ $a->id}})">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </button>

                            <form action="/karyawan/{{ $a->id }}" method="POST" class=" d-inline">
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
                        <form method="POST" action="/karyawans" id="form-update" class="mb-5" enctype="multipart/form-data">
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
                                <label for="alamat" class="form-label">Tanggal Lhair</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid
                                @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid
                                @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Domisili</label>
                                <input type="text" class="form-control @error('domisili') is-invalid
                                @enderror" id="domisili" name="domisili" value="{{ old('domisili') }}">
                                @error('domisili')
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
    </div>
</div>
</div>
   <!-- General JS Scripts -->
   <script src={{asset("template/assets/modules/jquery.min.js")}}></script>
   
 
           
   
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
                                                  url: "/edit/"+id,
                                                  type: "GET",
                                                  dataType: "JSON",
                                                  contentType: false,
                                                  processData: false,
                                                  success: function(data) {
                                                      $('[id="id"]').val(data.id);
                                                      $('[id="nama"]').val(data.nama);
                                                      $('[id="tanggal_lahir"]').val(data.tanggal_lahir);
                                                      $('[id="alamat"]').val(data.alamat);
                                                      $('[id="domisili"]').val(data.domisili);
                                                      $('[id="jabatan"]').val(data.jabatan);
                                                     
                                                   
                      
                      
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