<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Orders</h2>
                    <div class="card-subtitle">Details and history</div>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">download</i></button>
                    <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">print</i></button>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <!-- Simple DataTables example-->
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Ext.</th>
                        <th>City</th>
                        <th data-type="date" data-format="YYYY/MM/DD">Start Date</th>
                        <th>Completion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Unity Pugh</td>
                        <td>9958</td>
                        <td>Curicó</td>
                        <td>2005/02/11</td>
                        <td>37%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
