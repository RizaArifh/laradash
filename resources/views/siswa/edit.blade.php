@extends('layout.master')



@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Edit Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" class="form-control" name="nama_belakang" id="nama_depan" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">

                                </div>

                                <div class="form-group">
                                    <label for="nama_depan">Agama</label>
                                    <input type="text" class="form-control" name="agama" id="nama_depan" placeholder="Agama" value="{{$siswa->agama}}">

                                </div>

                                <div class="form-group">
                                    <label for="nama_depan">Jenis Kelamin</label>
                                    <select class="form-control" id="" name="jenis_kelamin">
                                        <option value="L" @if($siswa->jenis_kelamin=='L') selected @endif >Laki-Laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin=='P') selected @endif >Perempuan</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_depan">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="nama_depan">Avatar</label>
                                    <input type="file" name="avatar" id="" class="form-control">

                                </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop