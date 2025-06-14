<div>
    <div class="card card-raised h-100 mb-5">
        <div class="card-header bg-primary text-white px-4">
            <h2 class="card-title text-white mb-0">Graph showing Resolved vs Pending Complaints (This Year) </h2>
        </div>
        <div class="card-body">
            <canvas id="dashboardBarChart"></canvas>
        </div>
        <div class="card-footer bg-transparent position-relative ripple-gray">
            <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="{{ route('complaints.report')}}">
                <div class="fst-button">Open Report</div>
                <i class="material-icons icon-sm ms-1">chevron_right</i>
            </a>
        </div>
    </div>

    {{-- Chart Script --}}
    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        renderComplaintChart();
    });

    Livewire.hook('message.processed', () => {
        renderComplaintChart();
    });

    function renderComplaintChart() {
        const ctx = document.getElementById('dashboardBarChart');
        if (!ctx) return;

        if (window.complaintChart) {
            window.complaintChart.destroy();
        }

        window.complaintChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: 'Pending',
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderRadius: 4,
                        maxBarThickness: 32,
                        data: @json($pendingData),
                    },
                    {
                        label: 'Resolved',
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderRadius: 4,
                        maxBarThickness: 32,
                        data: @json($resolvedData),
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        ticks: { maxTicksLimit: 12 }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
@endpush

</div>
