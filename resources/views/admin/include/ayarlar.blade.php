@extends('admin.tema')
@section('admintitle') Laravel 8 Alpha-GY Site Ayarları @endsection
@section('css')
@endsection
@section('master')

<div class="content-body">
            <div class="container-fluid">
<div class="row">

<div class="col-lg-12">
                @if(session('basarili'))
                    <div class="alert alert-success">{{session('basarili')}}</div>
                @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Site Ayarları</h4>
                                <div class="basic-form">
                                    <form action="{{route('ayarPost')}}" method="post" enctype="multipart/form-data">
                                     @csrf
                                        

                                        <div class="form-group">
                                        <label>Site Başlık</label>

                                        <div class="form-group">
                                        <label>Anahtar</label>
                                        
                                            <input type="text" class="form-control input-default" placeholder="keywords" name="keywords" value="{{$veriler->keywords}}">
                                        </div>


                                        <div class="form-group">
                                        <label>Description</label>
                                        
                                            <input type="text" class="form-control input-default" placeholder="Description" name="description" value="{{$veriler->description}}">
                                        </div>
                                        
                                            <input type="text" class="form-control input-default" placeholder="Başlık" name="title" value="{{$veriler->title}}" required>
                                        </div>
                                        <div class="form-group">
                                         <label>Logo</label>
                                        
                                            <input type="file" class="form-control input-default" placeholder="Resim" name="logo">
                                        </div>
                                        <div class="form-group">
                                         <label>Favicon</label>
                                        
                                            <input type="file" class="form-control input-default" placeholder="Resim" name="favicon">
                                        </div>
                                        <div class="form-group">
                                        <label>Anahtar</label>
                                        
                                            <select type="text" class="form-control input-default" name="bakimmodu">
                                        <option value="1" @if ($veriler->bakimmodu==1) selected @endif >Siteyi Yayına Aç//AKTİF</option>    
                                        <option value="2" @if ($veriler->bakimmodu==2) selected @endif >Siteyi Yayına Aç//PASİF</option>  
                                        </select>
                                        </div>

                                        

                                        
                                        <div class="form-group">
                                        
                                        
                                            <input type="submit" class="btn btn-primary" name="gonder"value="KAYDET">
                                        </div>
                                        

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


</div>
            </div>
            <!-- #/ container -->
        </div>

@endsection
@section('js')
@endsection