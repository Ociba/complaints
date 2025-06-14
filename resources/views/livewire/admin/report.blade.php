<div>
    <div id="reports-to-print">
        <h2 class="mb-3 text-center"><u>Complaint Report For The Last Two Years</u></h2>
        @foreach($years as $year)
            <div class="card card-raised mb-3">
                <div class="card-header bg-primary small text-white" style="padding:2px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-1">
                            <h6 class="card-title text-white mb-0">Yearly Reports ({{ $year }})</h6>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">date</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                @foreach(range(1, 12) as $month)
                                    <th scope="col">{{ \Carbon\Carbon::create()->month($month)->format('M') }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Pending</th>
                                @foreach($dataByYear[$year]['pending'] ?? array_fill(1, 12, 0) as $count)
                                    <td>{{ $count }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Resolved</th>
                                @foreach($dataByYear[$year]['resolved'] ?? array_fill(1, 12, 0) as $count)
                                    <td>{{ $count }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                @foreach($dataByYear[$year]['total'] ?? array_fill(1, 12, 0) as $count)
                                    <td>{{ $count }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="btn btn-warning mb-3" onclick="printReports()" >
        Print All Reports
    </button>
    <button wire:click="exportExcel" class="btn btn-success mb-3">
        Export to Excel
    </button>
    <script>
        function printReports() {
            // Get the content to print
            const printContents = document.getElementById('reports-to-print').innerHTML;
            const originalContents = document.body.innerHTML;

            // Replace body with report content only
            document.body.innerHTML = printContents;

            window.print();

            // Restore original body content after printing
            document.body.innerHTML = originalContents;
            // Optional: Reload scripts and Livewire after print if necessary
            location.reload();
        }
    </script>
</div>


