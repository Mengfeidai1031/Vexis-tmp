<?php $__env->startSection('title', 'Clientes - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Clientes</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear clientes')): ?>
            <a href="<?php echo e(route('clientes.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nuevo Cliente</a>
        <?php endif; ?>
    </div>
</div>

<form action="<?php echo e(route('clientes.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar por nombre, apellidos, DNI, domicilio, CP o empresa..." value="<?php echo e(request('search')); ?>">
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i> Buscar</button>
    <?php if(request('search')): ?>
        <a href="<?php echo e(route('clientes.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a>
    <?php endif; ?>
</form>

<div class="vx-card">
    <div class="vx-card-body" style="padding: 0;">
        <?php if($clientes->count() > 0): ?>
            <div class="vx-table-wrapper">
                <table class="vx-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Empresa</th>
                            <th>Domicilio</th>
                            <th>CP</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="color: var(--vx-text-muted);"><?php echo e($cliente->id); ?></td>
                                <td style="font-weight: 600;"><?php echo e($cliente->nombre_completo); ?></td>
                                <td><span class="vx-badge vx-badge-gray" style="font-family: var(--vx-font-mono);"><?php echo e($cliente->dni); ?></span></td>
                                <td><?php echo e($cliente->empresa->nombre); ?></td>
                                <td style="font-size: 12px;"><?php echo e($cliente->domicilio); ?></td>
                                <td><?php echo e($cliente->codigo_postal); ?></td>
                                <td>
                                    <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $cliente)): ?>
                                            <a href="<?php echo e(route('clientes.show', $cliente)); ?>"><i class="bi bi-eye" style="color:var(--vx-info);"></i> Ver</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $cliente)): ?>
                                            <a href="<?php echo e(route('clientes.edit', $cliente)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $cliente)): ?>
                                            <form action="<?php echo e(route('clientes.destroy', $cliente)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este cliente?');">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button>
                                            </form>
                                        <?php endif; ?>
                                    </div></div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div style="padding: 16px 20px;"><?php echo e($clientes->links('vendor.pagination.vexis')); ?></div>
        <?php else: ?>
            <div class="vx-empty"><i class="bi bi-person-lines-fill"></i><p>No se encontraron clientes.</p></div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/clientes/index.blade.php ENDPATH**/ ?>