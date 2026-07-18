@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>PyAccountant</h4>
            </div>
            <div class="card-body">
              

                <hr>
                     <div class="iframe-container" style="width: 100%; height: 800px; border: 1px solid #ccc;">
    <iframe 
        src="http://127.0.0.1:5000/" 
        width="100%" 
        height="100%" 
        frameborder="0"
        title="PyAccountant UI">
        Tu navegador no soporta iframes.
    </iframe>
</div>      
            </div>
        </div>
    </div>
</div>

@endsection