<?php $__env->startSection('title', 'Catálogo de Precios - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header"><h1 class="vx-page-title">Catálogo de Precios</h1><div class="vx-page-actions"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear catalogo-precios')): ?><a href="<?php echo e(route('catalogo-precios.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Modelo</a><?php endif; ?></div></div>


<div style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;">
    <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('catalogo-precios.index', ['marca_id' => $m->id])); ?>" class="vx-btn <?php echo e($marcaSeleccionada == $m->id ? 'vx-btn-primary' : 'vx-btn-secondary'); ?>" style="<?php echo e($marcaSeleccionada == $m->id ? 'background:'.$m->color.';border-color:'.$m->color.';' : ''); ?>">
        <?php echo e($m->nombre); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<form action="<?php echo e(route('catalogo-precios.index')); ?>" method="GET" class="vx-search-box" style="margin-bottom:16px;">
    <input type="hidden" name="marca_id" value="<?php echo e($marcaSeleccionada); ?>">
    <input type="text" name="search" class="vx-input" placeholder="Buscar modelo o versión..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="combustible" class="vx-select" style="width:auto;"><option value="">Todos</option><?php $__currentLoopData = \App\Models\CatalogoPrecio::$combustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c); ?>" <?php echo e(request('combustible') == $c ? 'selected' : ''); ?>><?php echo e($c); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
</form>


<?php if($catalogo->count() > 0): ?>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px;">
    <?php $__currentLoopData = $catalogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="vx-card" style="overflow:hidden;">
        <div style="padding:16px 20px;">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;">
                <div>
                    <h4 style="font-size:16px;font-weight:800;margin:0 0 2px;"><?php echo e($item->modelo); ?></h4>
                    <p style="font-size:12px;color:var(--vx-text-muted);margin:0;"><?php echo e($item->version ?? ''); ?></p>
                </div>
                <?php if($item->marca): ?><span class="vx-badge" style="background:<?php echo e($item->marca->color); ?>20;color:<?php echo e($item->marca->color); ?>;font-size:10px;"><?php echo e($item->marca->nombre); ?></span><?php endif; ?>
            </div>
            <div style="display:flex;gap:12px;margin-top:12px;">
                <?php if($item->combustible): ?><span style="font-size:11px;color:var(--vx-text-muted);"><i class="bi bi-fuel-pump"></i> <?php echo e($item->combustible); ?></span><?php endif; ?>
                <?php if($item->potencia_cv): ?><span style="font-size:11px;color:var(--vx-text-muted);"><i class="bi bi-speedometer2"></i> <?php echo e($item->potencia_cv); ?> CV</span><?php endif; ?>
                <?php if($item->anio_modelo): ?><span style="font-size:11px;color:var(--vx-text-muted);"><i class="bi bi-calendar"></i> <?php echo e($item->anio_modelo); ?></span><?php endif; ?>
            </div>
            <div style="margin-top:14px;display:flex;align-items:baseline;gap:8px;">
                <?php if($item->precio_oferta): ?>
                <span style="font-size:22px;font-weight:800;color:var(--vx-success);font-family:var(--vx-font-mono);"><?php echo e(number_format($item->precio_oferta, 0, ',', '.')); ?>€</span>
                <span style="font-size:14px;color:var(--vx-text-muted);text-decoration:line-through;font-family:var(--vx-font-mono);"><?php echo e(number_format($item->precio_base, 0, ',', '.')); ?>€</span>
                <?php $ahorro = $item->precio_base - $item->precio_oferta; ?>
                <span class="vx-badge vx-badge-success" style="font-size:10px;">-<?php echo e(number_format($ahorro, 0, ',', '.')); ?>€</span>
                <?php else: ?>
                <span style="font-size:22px;font-weight:800;color:var(--vx-primary);font-family:var(--vx-font-mono);"><?php echo e(number_format($item->precio_base, 0, ',', '.')); ?>€</span>
                <?php endif; ?>
            </div>
            <div style="margin-top:12px;display:flex;justify-content:space-between;align-items:center;">
                <?php if($item->disponible): ?><span class="vx-badge vx-badge-success">Disponible</span><?php else: ?><span class="vx-badge vx-badge-gray">No disponible</span><?php endif; ?>
                <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar catalogo-precios')): ?><a href="<?php echo e(route('catalogo-precios.edit', $item)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar catalogo-precios')): ?><form action="<?php echo e(route('catalogo-precios.destroy', $item)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button></form><?php endif; ?>
                </div></div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div style="margin-top:16px;"><?php echo e($catalogo->links('vendor.pagination.vexis')); ?></div>
<?php else: ?>
<div class="vx-card"><div class="vx-card-body"><div class="vx-empty"><i class="bi bi-currency-euro"></i><p>No hay modelos en el catálogo para esta marca.</p></div></div></div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/catalogo-precios/index.blade.php ENDPATH**/ ?>