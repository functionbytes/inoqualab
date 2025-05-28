<div class="card-action card-tabs  mr-auto">
    <ul class="nav nav-tabs style-2">
        <li class="nav-item">
            <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">Todas <span class="badge badge-pill shadow-primary badge-primary">{{ count($alls) }}</span></a>
        </li>
        <li class="nav-item">
            <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Pendiente <span class="badge badge-pill badge-info shadow-info">{{ count($pendings) }}</span></a>
        </li>
        <li class="nav-item">
            <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">En Proceso <span class="badge badge-pill badge-warning shadow-warning">{{ count($process) }}</span></a>
        </li>
        <li class="nav-item">
            <a href="#navpills-4" class="nav-link" data-toggle="tab" aria-expanded="true">Terminado <span class="badge badge-pill badge-danger shadow-danger">{{ count($finisheds) }}</span></a>
        </li>
        <li class="nav-item">
            <a href="#navpills-5" class="nav-link" data-toggle="tab" aria-expanded="true">Solucionado <span class="badge badge-pill badge-light shadow-light">{{ count($solutions) }}</span></a>
        </li>
    </ul>
</div>
