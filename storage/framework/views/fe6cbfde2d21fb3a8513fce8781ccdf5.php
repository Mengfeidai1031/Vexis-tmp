<?php $__env->startSection('title', 'Citas Taller - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title">Citas de Taller</h1><div class="vx-page-actions"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear citas')): ?><a href="<?php echo e(route('citas.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nueva Cita</a><?php endif; ?></div></div>


<div class="vx-card" style="margin-bottom:20px;">
    <div class="vx-card-header" style="display:flex;justify-content:space-between;align-items:center;">
        <h4><i class="bi bi-calendar-week" style="color:var(--vx-primary);"></i> Semana <?php echo e($semanaInicio->format('d/m')); ?> — <?php echo e($semanaFin->format('d/m/Y')); ?></h4>
        <div style="display:flex;gap:6px;">
            <a href="<?php echo e(route('citas.index', ['semana' => $semanaInicio->copy()->subWeek()->format('Y-m-d')])); ?>" class="vx-btn vx-btn-secondary vx-btn-sm"><i class="bi bi-chevron-left"></i></a>
            <a href="<?php echo e(route('citas.index', ['semana' => now()->format('Y-m-d')])); ?>" class="vx-btn vx-btn-secondary vx-btn-sm">Hoy</a>
            <a href="<?php echo e(route('citas.index', ['semana' => $semanaInicio->copy()->addWeek()->format('Y-m-d')])); ?>" class="vx-btn vx-btn-secondary vx-btn-sm"><i class="bi bi-chevron-right"></i></a>
        </div>
    </div>
    <div class="vx-card-body" style="padding:0;overflow-x:auto;">
        <table class="vx-table" style="min-width:700px;">
            <thead><tr><th style="width:60px;">Hora</th>
                <?php for($d = 0; $d < 7; $d++): ?>
                <?php $dia = $semanaInicio->copy()->addDays($d); $hoy = $dia->isToday(); ?>
                <th style="text-align:center;<?php echo e($hoy ? 'background:var(--vx-primary);color:white;' : ''); ?>"><?php echo e($dia->translatedFormat('D d')); ?></th>
                <?php endfor; ?>
            </tr></thead>
            <tbody>
                <?php for($h = 8; $h <= 18; $h++): ?>
                <tr>
                    <td style="font-size:11px;font-family:var(--vx-font-mono);color:var(--vx-text-muted);"><?php echo e(str_pad($h, 2, '0', STR_PAD_LEFT)); ?>:00</td>
                    <?php for($d = 0; $d < 7; $d++): ?>
                    <?php
                        $dia = $semanaInicio->copy()->addDays($d)->format('Y-m-d');
                        $hora = str_pad($h, 2, '0', STR_PAD_LEFT);
                        $citasSlot = ($citasSemana[$dia] ?? collect())->filter(fn($c) => substr($c->hora_inicio, 0, 2) == $hora);
                    ?>
                    <td style="font-size:11px;vertical-align:top;padding:4px;">
                        <?php $__currentLoopData = $citasSlot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="background:<?php echo e(match($c->estado) { 'confirmada' => '#2ecc7130', 'en_curso' => '#3498db30', 'completada' => '#95a5a630', 'cancelada' => '#e74c3c20', default => '#f39c1230' }); ?>;padding:3px 6px;border-radius:4px;margin-bottom:2px;border-left:3px solid <?php echo e(match($c->estado) { 'confirmada' => '#2ecc71', 'en_curso' => '#3498db', 'completada' => '#95a5a6', 'cancelada' => '#e74c3c', default => '#f39c12' }); ?>;">
                            <strong><?php echo e($c->mecanico->nombre ?? ''); ?></strong><br><?php echo e(Str::limit($c->cliente_nombre, 15)); ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>


<div style="display:flex;gap:16px;margin-bottom:12px;font-size:11px;flex-wrap:wrap;">
    <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#f39c12;margin-right:3px;"></span>Pendiente</span>
    <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#2ecc71;margin-right:3px;"></span>Confirmada</span>
    <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#3498db;margin-right:3px;"></span>En curso</span>
    <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#95a5a6;margin-right:3px;"></span>Completada</span>
    <span><span style="display:inline-block;width:10px;height:10px;border-radius:3px;background:#e74c3c;margin-right:3px;"></span>Cancelada</span>
</div>

<form action="<?php echo e(route('citas.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar cliente o vehículo..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="taller_id" class="vx-select" style="width:auto;"><option value="">Todos los talleres</option><?php $__currentLoopData = $talleres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($t->id); ?>" <?php echo e(request('taller_id') == $t->id ? 'selected' : ''); ?>><?php echo e($t->nombre); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <select name="estado" class="vx-select" style="width:auto;"><option value="">Todos</option><?php $__currentLoopData = \App\Models\CitaTaller::$estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($k); ?>" <?php echo e(request('estado') == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','taller_id','estado'])): ?><a href="<?php echo e(route('citas.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>


<div class="vx-card"><div class="vx-card-body" style="padding:0;">
    <?php if($citas->count() > 0): ?>
    <div class="vx-table-wrapper"><table class="vx-table">
        <thead><tr><th>Fecha</th><th>Hora</th><th>Cliente</th><th>Vehículo</th><th>Mecánico</th><th>Taller</th><th>Estado</th><th>Acciones</th></tr></thead>
        <tbody><?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td style="font-size:12px;"><?php echo e($c->fecha->format('d/m/Y')); ?></td>
            <td style="font-family:var(--vx-font-mono);font-size:12px;"><?php echo e(substr($c->hora_inicio, 0, 5)); ?><?php if($c->hora_fin): ?>–<?php echo e(substr($c->hora_fin, 0, 5)); ?><?php endif; ?></td>
            <td style="font-weight:600;"><?php echo e(Str::limit($c->cliente_nombre, 25)); ?></td>
            <td style="font-size:12px;"><?php echo e($c->vehiculo_info ?? '—'); ?></td>
            <td style="font-size:12px;"><?php echo e($c->mecanico->nombre_completo ?? '—'); ?></td>
            <td style="font-size:12px;"><?php echo e($c->taller->nombre ?? '—'); ?></td>
            <td><?php switch($c->estado): case ('pendiente'): ?><span class="vx-badge vx-badge-warning">Pendiente</span><?php break; ?> <?php case ('confirmada'): ?><span class="vx-badge vx-badge-success">Confirmada</span><?php break; ?> <?php case ('en_curso'): ?><span class="vx-badge vx-badge-info">En Curso</span><?php break; ?> <?php case ('completada'): ?><span class="vx-badge vx-badge-gray">Completada</span><?php break; ?> <?php case ('cancelada'): ?><span class="vx-badge vx-badge-danger">Cancelada</span><?php break; ?> <?php endswitch; ?></td>
            <td><div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar citas')): ?><a href="<?php echo e(route('citas.edit', $c)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar citas')): ?><form action="<?php echo e(route('citas.destroy', $c)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button></form><?php endif; ?>
            </div></div></td>
        </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
    </table></div>
    <div style="padding:16px 20px;"><?php echo e($citas->links('vendor.pagination.vexis')); ?></div>
    <?php else: ?><div class="vx-empty"><i class="bi bi-calendar-check"></i><p>No se encontraron citas.</p></div><?php endif; ?>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/citas/index.blade.php ENDPATH**/ ?>