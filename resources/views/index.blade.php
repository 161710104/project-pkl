@extends('layouts.layout')
@section('content')
<main class="app-content">
        <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">

            <center>
                    <h1><i class="fa fa-user" style="width: 80px;height: 80px"></i></h1>
                    <h2>Selamat datang {{ Auth::user()->name }} !!!</h2>
            </center>
          
        
</div>
</div>
</div>
</div>
</div>
</main>
@endsection
