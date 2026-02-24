<?php $__env->startSection('title', 'Coches de Sustitución - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title">Coches de Sustitución</h1><div class="vx-page-actions"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear coches-sustitucion')): ?><a href="<?php echo e(route('coches-sustitucion.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo</a><?php endif; ?></div></div>


<div class="vx-card" style="margin-bottom:20px;">
    <div class="vx-card-header" style="display:flex;justify-content:space-between;align-items:center;">
        <h4><i class="bi bi-calendar3" style="color:var(--vx-primary);"></i> Reservas <?php echo e($mes->translatedFormat('F Y')); ?></h4>
        <div style="display:flex;gap:6px;">
            <a href="<?php echo e(route('coches-sustitucion.index', ['mes' => $mes->copy()->subMonth()->format('Y-m')])); ?>" class="vx-btn vx-btn-secondary vx-btn-sm"><i class="bi bi-chevron-left"></i></a>
            <a href="<?php echo e(route('coches-sustitucion.index')); ?>" class="vx-btn vx-btn-secondary vx-btn-sm">Hoy</a>
            <a href="<?php echo e(route('coches-sustitucion.index', ['mes' => $mes->copy()->addMonth()->format('Y-m')])); ?>" class="vx-btn vx-btn-secondary vx-btn-sm"><i class="bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="vx-card-body">
        <div id="calRes" style="display:grid;grid-template-columns:repeat(7,1fr);gap:1px;font-size:11px;text-align:center;"></div>
        <div style="display:flex;gap:16px;margin-top:12px;font-size:11px;">
            <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#f39c12;margin-right:3px;"></span>Reservado</span>
            <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#3498db;margin-right:3px;"></span>Entregado</span>
            <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#2ecc71;margin-right:3px;"></span>Devuelto</span>
        </div>
    </div>
</div>


<form action="<?php echo e(route('coches-sustitucion.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar matrícula o modelo..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="taller_id" class="vx-select" style="width:auto;"><option value="">Todos los talleres</option><?php $__currentLoopData = $talleres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($t->id); ?>" <?php echo e(request('taller_id') == $t->id ? 'selected' : ''); ?>><?php echo e($t->nombre); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','taller_id'])): ?><a href="<?php echo e(route('coches-sustitucion.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>


<div class="vx-card"><div class="vx-card-body" style="padding:0;">
    <?php if($coches->count() > 0): ?>
    <div class="vx-table-wrapper"><table class="vx-table">
        <thead><tr><th>Matrícula</th><th>Modelo</th><th>Marca</th><th>Color</th><th>Taller</th><th>Disponible</th><th>Acciones</th></tr></thead>
        <tbody><?php $__currentLoopData = $coches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-family:var(--vx-font-mono);font-weight:600;"><?php echo e($c->matricula); ?></td>
            <td><?php echo e($c->modelo); ?></td>
            <td><?php if($c->marca): ?><span class="vx-badge" style="background:<?php echo e($c->marca->color); ?>20;color:<?php echo e($c->marca->color); ?>;"><?php echo e($c->marca->nombre); ?></span><?php endif; ?></td>
            <td style="font-size:12px;"><?php echo e($c->color ?? '—'); ?></td>
            <td style="font-size:12px;"><?php echo e($c->taller->nombre ?? '—'); ?></td>
            <td><?php if($c->disponible): ?><span class="vx-badge vx-badge-success">Disponible</span><?php else: ?><span class="vx-badge vx-badge-warning">En uso</span><?php endif; ?></td>
            <td><div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                <a href="<?php echo e(route('coches-sustitucion.show', $c)); ?>"><i class="bi bi-eye" style="color:var(--vx-info);"></i> Ver</a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar coches-sustitucion')): ?><a href="<?php echo e(route('coches-sustitucion.edit', $c)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar coches-sustitucion')): ?><form action="<?php echo e(route('coches-sustitucion.destroy', $c)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button></form><?php endif; ?>
            </div></div></td>
        </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
    </table></div>
    <div style="padding:16px 20px;"><?php echo e($coches->links('vendor.pagination.vexis')); ?></div>
    <?php else: ?><div class="vx-empty"><i class="bi bi-car-front"></i><p>No se encontraron coches de sustitución.</p></div><?php endif; ?>
</div></div>

<?php $__env->startPush('scripts'); ?>
<script>
const reservas = <?php echo json_encode($reservas, 15, 512) ?>;
const mesDate = new Date('<?php echo e($mes->format("Y-m-d")); ?>');
const anio = mesDate.getFullYear(), mesIdx = mesDate.getMonth();
const cal = document.getElementById('calRes');
const daysInMonth = new Date(anio, mesIdx + 1, 0).getDate();
let startDay = new Date(anio, mesIdx, 1).getDay();
startDay = startDay === 0 ? 6 : startDay - 1;
['L','M','X','J','V','S','D'].forEach(d => cal.innerHTML += `<div style="font-weight:700;color:var(--vx-text-muted);padding:4px;">${d}</div>`);
for (let i = 0; i < startDay; i++) cal.innerHTML += '<div></div>';
for (let d = 1; d <= daysInMonth; d++) {
    const ds = `${anio}-${String(mesIdx+1).padStart(2,'0')}-${String(d).padStart(2,'0')}`;
    const ev = reservas.find(r => ds >= r.start && ds < r.end);
    const bg = ev ? ev.color : 'transparent';
    const color = ev ? 'white' : 'var(--vx-text)';
    const title = ev ? ev.title : '';
    cal.innerHTML += `<div style="padding:6px 2px;border-radius:4px;background:${bg};color:${color};cursor:${ev?'help':'default'};" title="${title}">${d}</div>`;
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/coches-sustitucion/index.blade.php ENDPATH**/ ?>