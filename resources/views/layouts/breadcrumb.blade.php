<div class="row justify-content-between align-items-center mb-5">
    <div class="col flex-shrink-0 mb-5 mb-md-0">
        <h1 class="display-4 mb-0">Dashboard</h1>
    </div>
    <div class="col-12 col-md-auto">
        <div class="d-flex flex-column flex-sm-row gap-3">
        {{ str_replace('.', ' ', Request()->route()->getName()) }}
        </div>
    </div>
</div>