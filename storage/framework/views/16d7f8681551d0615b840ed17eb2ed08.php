<?php $__env->startSection('title', 'Tasaciones - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title">Tasaciones</h1><div class="vx-page-actions"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear tasaciones')): ?><a href="<?php echo e(route('tasaciones.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nueva Tasación</a><?php endif; ?></div></div>
<form action="<?php echo e(route('tasaciones.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por código, marca, modelo o matrícula..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="estado" class="vx-select" style="width:auto;"><option value="">Todos</option><?php $__currentLoopData = \App\Models\Tasacion::$estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($k); ?>" <?php echo e(request('estado') == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','estado'])): ?><a href="<?php echo e(route('tasaciones.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>
<div class="vx-card"><div class="vx-card-body" style="padding:0;">
    <?php if($tasaciones->count() > 0): ?>
    <div class="vx-table-wrapper"><table class="vx-table">
        <thead><tr><th>Código</th><th>Vehículo</th><th>Año</th><th>Km</th><th>Matrícula</th><th>Estado Veh.</th><th>Valor Est.</th><th>Estado</th><th>Fecha</th><th>Acciones</th></tr></thead>
        <tbody><?php $__currentLoopData = $tasaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-family:var(--vx-font-mono);font-size:11px;"><?php echo e($t->codigo_tasacion); ?></td>
            <td style="font-weight:600;font-size:13px;"><?php echo e($t->vehiculo_marca); ?> <?php echo e($t->vehiculo_modelo); ?></td>
            <td style="text-align:center;"><?php echo e($t->vehiculo_anio); ?></td>
            <td style="font-family:var(--vx-font-mono);font-size:12px;"><?php echo e(number_format($t->kilometraje)); ?></td>
            <td style="font-family:var(--vx-font-mono);font-size:12px;"><?php echo e($t->matricula ?? '—'); ?></td>
            <td><span class="vx-badge vx-badge-<?php echo e(match($t->estado_vehiculo) { 'excelente' => 'success', 'bueno' => 'info', 'regular' => 'warning', default => 'danger' }); ?>"><?php echo e(ucfirst($t->estado_vehiculo)); ?></span></td>
            <td style="font-family:var(--vx-font-mono);font-weight:700;"><?php echo e($t->valor_estimado ? number_format($t->valor_estimado, 2).'€' : '—'); ?></td>
            <td><?php switch($t->estado): case ('pendiente'): ?><span class="vx-badge vx-badge-warning">Pendiente</span><?php break; ?> <?php case ('valorada'): ?><span class="vx-badge vx-badge-info">Valorada</span><?php break; ?> <?php case ('aceptada'): ?><span class="vx-badge vx-badge-success">Aceptada</span><?php break; ?> <?php case ('rechazada'): ?><span class="vx-badge vx-badge-danger">Rechazada</span><?php break; ?> <?php endswitch; ?></td>
            <td style="font-size:12px;"><?php echo e($t->fecha_tasacion->format('d/m/Y')); ?></td>
            <td><div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                <a href="<?php echo e(route('tasaciones.show', $t)); ?>"><i class="bi bi-eye" style="color:var(--vx-info);"></i> Ver</a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar tasaciones')): ?><a href="<?php echo e(route('tasaciones.edit', $t)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar tasaciones')): ?><form action="<?php echo e(route('tasaciones.destroy', $t)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button></form><?php endif; ?>
            </div></div></td>
        </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
    </table></div>
    <div style="padding:16px 20px;"><?php echo e($tasaciones->links('vendor.pagination.vexis')); ?></div>
    <?php else: ?><div class="vx-empty"><i class="bi bi-calculator"></i><p>No se encontraron tasaciones.</p></div><?php endif; ?>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/tasaciones/index.blade.php ENDPATH**/ ?>