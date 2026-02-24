<?php $__env->startSection('title', 'Dataxis Ventas - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title"><i class="bi bi-currency-euro" style="color:var(--vx-success);"></i> Dataxis — Ventas</h1><a href="<?php echo e(route('dataxis.inicio')); ?>" class="vx-btn vx-btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a></div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
    <div class="vx-card" style="grid-column:span 2;"><div class="vx-card-header"><h4>Ventas e Importe por Mes</h4></div><div class="vx-card-body"><canvas id="chartVentasMes" height="140"></canvas></div></div>
    <div class="vx-card"><div class="vx-card-header"><h4>Por Estado</h4></div><div class="vx-card-body"><canvas id="chartEstado" height="220"></canvas></div></div>
    <div class="vx-card"><div class="vx-card-header"><h4>Forma de Pago</h4></div><div class="vx-card-body"><canvas id="chartPago" height="220"></canvas></div></div>
    <div class="vx-card"><div class="vx-card-header"><h4>Ventas por Marca</h4></div><div class="vx-card-body"><canvas id="chartMarca" height="220"></canvas></div></div>
    <div class="vx-card"><div class="vx-card-header"><h4>Top Vendedores</h4></div><div class="vx-card-body"><canvas id="chartVendedores" height="220"></canvas></div></div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
Chart.defaults.color = isDark ? '#9CA3AF' : '#6C757D';
Chart.defaults.borderColor = isDark ? '#374151' : '#E9ECEF';
const colors = ['#33AADD','#2ECC71','#F39C12','#E74C3C','#9B59B6','#1ABC9C'];

new Chart(document.getElementById('chartVentasMes'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($ventasMes->pluck('mes')); ?>,
        datasets: [
            { label: 'Nº Ventas', data: <?php echo json_encode($ventasMes->pluck('total')); ?>, backgroundColor: 'rgba(51,170,221,0.7)', borderRadius: 6, yAxisID: 'y' },
            { label: 'Importe (€)', data: <?php echo json_encode($ventasMes->pluck('importe')); ?>, type: 'line', borderColor: '#2ECC71', backgroundColor: 'rgba(46,204,113,0.1)', fill: true, tension: 0.4, yAxisID: 'y1', pointRadius: 5 }
        ]
    },
    options: { scales: { y: { beginAtZero: true, position: 'left' }, y1: { beginAtZero: true, position: 'right', grid: { drawOnChartArea: false }, ticks: { callback: v => (v/1000).toFixed(0)+'k€' } } } }
});

new Chart(document.getElementById('chartEstado'), {
    type: 'doughnut',
    data: { labels: <?php echo json_encode($ventasEstado->pluck('estado')); ?>, datasets: [{ data: <?php echo json_encode($ventasEstado->pluck('total')); ?>, backgroundColor: ['#F39C12','#3498DB','#2ECC71','#E74C3C'], borderWidth: 2, borderColor: isDark ? '#1F2937' : '#fff' }] },
    options: { plugins: { legend: { position: 'bottom' } } }
});

new Chart(document.getElementById('chartPago'), {
    type: 'polarArea',
    data: { labels: <?php echo json_encode($ventasPago->pluck('forma_pago')); ?>, datasets: [{ data: <?php echo json_encode($ventasPago->pluck('total')); ?>, backgroundColor: colors.map(c => c + '99') }] },
    options: { plugins: { legend: { position: 'bottom' } } }
});

new Chart(document.getElementById('chartMarca'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($ventasMarca->pluck('nombre')); ?>,
        datasets: [{ label: 'Ventas', data: <?php echo json_encode($ventasMarca->pluck('total')); ?>, backgroundColor: <?php echo json_encode($ventasMarca->pluck('color')->map(fn($c) => $c . '99')); ?>, borderColor: <?php echo json_encode($ventasMarca->pluck('color')); ?>, borderWidth: 2, borderRadius: 6 }]
    },
    options: { indexAxis: 'y', plugins: { legend: { display: false } } }
});

new Chart(document.getElementById('chartVendedores'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($topVendedores->pluck('nombre')); ?>,
        datasets: [{ label: 'Ventas', data: <?php echo json_encode($topVendedores->pluck('total')); ?>, backgroundColor: 'rgba(155,89,182,0.7)', borderRadius: 6 }]
    },
    options: { indexAxis: 'y', plugins: { legend: { display: false } } }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/dataxis/ventas.blade.php ENDPATH**/ ?>