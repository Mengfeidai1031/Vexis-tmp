<?php $__env->startSection('title', 'Tasación Formal - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title"><i class="bi bi-clipboard-check" style="color:#F1C40F;"></i> Solicitud de Tasación Formal</h1>
    <a href="<?php echo e(route('cliente.inicio')); ?>" class="vx-btn vx-btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
</div>

<div class="vx-card" style="margin-bottom:16px;background:rgba(52,152,219,0.06);border-color:rgba(52,152,219,0.22);">
    <div class="vx-card-body" style="padding:12px 16px;display:flex;align-items:flex-start;gap:8px;font-size:12px;color:var(--vx-text-muted);">
        <i class="bi bi-info-circle" style="color:var(--vx-info);font-size:16px;flex-shrink:0;"></i>
        Esta solicitud se envía al módulo de Tasaciones para revisión. Puedes usar primero la <strong>Pretasación IA</strong> y después tramitar aquí la tasación oficial.
    </div>
</div>

<div style="display:grid;grid-template-columns:1.2fr 1fr;gap:16px;">
    <div class="vx-card">
        <div class="vx-card-header"><h4><i class="bi bi-send"></i> Nueva solicitud</h4></div>
        <div class="vx-card-body">
            <form action="<?php echo e(route('cliente.tasacion.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 12px;">
                    <div class="vx-form-group">
                        <label class="vx-label">Marca vehículo <span class="required">*</span></label>
                        <input type="text" class="vx-input <?php $__errorArgs = ['vehiculo_marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vehiculo_marca" value="<?php echo e(old('vehiculo_marca')); ?>" required>
                        <?php $__errorArgs = ['vehiculo_marca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="vx-form-group">
                        <label class="vx-label">Modelo <span class="required">*</span></label>
                        <input type="text" class="vx-input <?php $__errorArgs = ['vehiculo_modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vehiculo_modelo" value="<?php echo e(old('vehiculo_modelo')); ?>" required>
                        <?php $__errorArgs = ['vehiculo_modelo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 12px;">
                    <div class="vx-form-group">
                        <label class="vx-label">Año <span class="required">*</span></label>
                        <input type="number" class="vx-input <?php $__errorArgs = ['vehiculo_anio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vehiculo_anio" value="<?php echo e(old('vehiculo_anio', date('Y') - 3)); ?>" min="1990" max="2030" required>
                        <?php $__errorArgs = ['vehiculo_anio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="vx-form-group">
                        <label class="vx-label">Kilometraje <span class="required">*</span></label>
                        <input type="number" class="vx-input <?php $__errorArgs = ['kilometraje'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="kilometraje" value="<?php echo e(old('kilometraje')); ?>" min="0" required style="font-family:var(--vx-font-mono);">
                        <?php $__errorArgs = ['kilometraje'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 12px;">
                    <div class="vx-form-group">
                        <label class="vx-label">Matrícula</label>
                        <input type="text" class="vx-input <?php $__errorArgs = ['matricula'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="matricula" value="<?php echo e(old('matricula')); ?>" style="text-transform:uppercase;">
                        <?php $__errorArgs = ['matricula'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="vx-form-group">
                        <label class="vx-label">Combustible</label>
                        <select class="vx-select <?php $__errorArgs = ['combustible'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="combustible">
                            <option value="">—</option>
                            <?php $__currentLoopData = \App\Models\Tasacion::$combustibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $combustible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($combustible); ?>" <?php echo e(old('combustible') === $combustible ? 'selected' : ''); ?>><?php echo e($combustible); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['combustible'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 12px;">
                    <div class="vx-form-group">
                        <label class="vx-label">Estado del vehículo <span class="required">*</span></label>
                        <select class="vx-select <?php $__errorArgs = ['estado_vehiculo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="estado_vehiculo" required>
                            <?php $__currentLoopData = \App\Models\Tasacion::$estadosVehiculo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e(old('estado_vehiculo', 'bueno') === $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['estado_vehiculo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="vx-form-group">
                        <label class="vx-label">Concesionario <span class="required">*</span></label>
                        <select class="vx-select <?php $__errorArgs = ['empresa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="empresa_id" required>
                            <option value="">Seleccione…</option>
                            <?php $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($empresa->id); ?>" <?php echo e((string) old('empresa_id') === (string) $empresa->id ? 'selected' : ''); ?>><?php echo e($empresa->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['empresa_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0 12px;">
                    <div class="vx-form-group">
                        <label class="vx-label">Marca comercial (opcional)</label>
                        <select class="vx-select <?php $__errorArgs = ['marca_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="marca_id">
                            <option value="">—</option>
                            <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($marca->id); ?>" <?php echo e((string) old('marca_id') === (string) $marca->id ? 'selected' : ''); ?>><?php echo e($marca->nombre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['marca_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="vx-form-group">
                        <label class="vx-label">Observaciones</label>
                        <textarea class="vx-input <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="observaciones" rows="2"><?php echo e(old('observaciones')); ?></textarea>
                        <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="vx-invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div style="display:flex;justify-content:flex-end;gap:8px;">
                    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-check-lg"></i> Enviar solicitud</button>
                </div>
            </form>
        </div>
    </div>

    <div class="vx-card">
        <div class="vx-card-header"><h4><i class="bi bi-clock-history"></i> Mis solicitudes recientes</h4></div>
        <div class="vx-card-body">
            <?php if($solicitudes->count() > 0): ?>
                <div style="display:flex;flex-direction:column;gap:10px;">
                    <?php $__currentLoopData = $solicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="border:1px solid var(--vx-border);border-radius:8px;padding:10px;">
                            <div style="display:flex;justify-content:space-between;gap:8px;align-items:center;">
                                <strong style="font-size:12px;"><?php echo e($s->codigo_tasacion); ?></strong>
                                <span class="vx-badge vx-badge-<?php echo e(match($s->estado) { 'pendiente' => 'warning', 'valorada' => 'info', 'aceptada' => 'success', default => 'danger' }); ?>"><?php echo e(\App\Models\Tasacion::$estados[$s->estado] ?? ucfirst($s->estado)); ?></span>
                            </div>
                            <div style="font-size:12px;margin-top:4px;"><?php echo e($s->vehiculo_marca); ?> <?php echo e($s->vehiculo_modelo); ?> (<?php echo e($s->vehiculo_anio); ?>)</div>
                            <div style="font-size:11px;color:var(--vx-text-muted);margin-top:2px;">Solicitada el <?php echo e($s->fecha_tasacion->format('d/m/Y')); ?></div>
                            <?php if($s->valor_final): ?>
                                <div style="font-size:12px;color:var(--vx-success);font-weight:700;margin-top:4px;">Valor final: <?php echo e(number_format($s->valor_final, 2)); ?> €</div>
                            <?php elseif($s->valor_estimado): ?>
                                <div style="font-size:12px;color:var(--vx-primary);font-weight:700;margin-top:4px;">Valor estimado: <?php echo e(number_format($s->valor_estimado, 2)); ?> €</div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="vx-empty" style="padding:28px 10px;">
                    <i class="bi bi-clipboard-x"></i>
                    <p>Aún no tienes solicitudes de tasación formal.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/cliente/tasacion.blade.php ENDPATH**/ ?>