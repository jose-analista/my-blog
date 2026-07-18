@extends ('layouts.inc.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>PHPmyadmin</h4>
            </div>
            <div class="card-body">
              

                <hr>
                     <div class="iframe-container" style="width: 100%; height: 800px; border: 1px solid #ccc;">
    <iframe 
        src="http://localhost/" 
        width="100%" 
        height="100%" 
        frameborder="0"
        title="PHPmyadmin">
        Tu navegador no soporta iframes.
    </iframe>
</div>      
            </div>
        </div>
    </div>
</div>

@endsection