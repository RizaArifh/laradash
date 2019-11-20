@extends('layout.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Data Siswa

                                
                            <h3>
                            <div class="right">
                            <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>
                                <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export PDF</a>
                                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle btn btn-sm btn-success"> Tambah Siswa</i> </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="siswa/create" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group {{$errors->has('nama_depan')?'has-error':''}}">
                                                        <label for="nama_depan">Nama Depan</label>
                                                        <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                                                        @if($errors->has('nama_depan'))
                                                        <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                                        @endif
                                                        @csrf
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama_belakang">Nama Belakang</label>
                                                        <input type="text" class="form-control" name="nama_belakang" id="nama_depan" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">

                                                    </div>

                                                    <div class="form-group {{$errors->has('email')?'has-error':''}}">
                                                        <label for="nama_belakang">Email</label>
                                                        <input type="email" class="form-control" name="email" id="nama_depan" placeholder="Email" value="{{old('email')}}">
                                                        @if($errors->has('email'))
                                                        <span class="help-block">{{$errors->first('email')}}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{$errors->has('agama')?'has-error':''}}">
                                                        <label for="nama_depan">Agama</label>
                                                        <input type="text" class="form-control" name="agama" id="nama_depan" placeholder="Agama" value="{{old('agama')}}">
                                                        @if($errors->has('agama'))
                                                        <span class="help-block">{{$errors->first('agama')}}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group {{$errors->has('jenis_kelamin')?'has-error':''}}">
                                                        <label for="nama_depan">Jenis Kelamin</label>
                                                        <select class="form-control" id="" name="jenis_kelamin">
                                                            <option value="L" {{(old('jenis_kelamin')=='L') ? 'selected':''}}>Laki-Laki</option>
                                                            <option value="P" {{(old('jenis_kelamin')=='P') ? 'selected':''}}>Perempuan</option>
                                                        </select>
                                                        @if($errors->has('jenis_kelamin'))
                                                        <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama_depan">Alamat</label>
                                                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                                                    </div>

                                                    <div class="form-group {{$errors->has('avatar')?'has-error':''}}">
                                                        <label for="nama_depan">Avatar</label>
                                                        <input type="file" name="avatar" id="" class="form-control">
                                                        @if($errors->has('avatar'))
                                                        <span class="help-block">{{$errors->first('avatar')}}</span>
                                                        @endif
                                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-secondary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Agama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Test</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_siswa as $siswa)
                                    <tr>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                                        <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                                        <td>{{$siswa->agama}}</td>
                                        <td>{{$siswa->jenis_kelamin}}</td>
                                        <td>{{$siswa->alamat}}</td>
                                        <td>{{$siswa->RataRataNilai()}}</td>
                                        <td><a href="siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit </a>
                                            <a href="#" class="btn btn-danger btn-sm delete_siswa" siswa-id="{{$siswa->id}}">Delete </a></td>
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
</div>
@stop
@section('footer')
<script>
$('.delete_siswa').click(function(){
    var siswa_id= $(this).attr('siswa-id');
    // alert(siswa_id);
    

Swal.fire({
  title: 'Yakin?',
  text: "Yakin Akan Hapus dengan id "+ siswa_id +"?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
      window.location="siswa/{{$siswa->id}}/delete";
  }
})
})
</script>

@stop