<?php $__env->startSection('title', 'Campañas - VEXIS'); ?>
<?php $__env->startSection('content'); ?>
<div class="vx-page-header">
    <h1 class="vx-page-title">Gestión de Campañas</h1>
    <div class="vx-page-actions">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear campanias')): ?>
            <a href="<?php echo e(route('campanias.create')); ?>" class="vx-btn vx-btn-primary"><i class="bi bi-plus-circle"></i> Nueva Campaña</a>
        <?php endif; ?>
    </div>
</div>
<form action="<?php echo e(route('campanias.index')); ?>" method="GET" class="vx-search-box">
    <input type="text" name="search" class="vx-input" placeholder="Buscar campaña..." value="<?php echo e(request('search')); ?>" style="flex:1;">
    <select name="marca_id" class="vx-select" style="width:auto;">
        <option value="">Todas las marcas</option>
        <?php $__currentLoopData = $marcas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($marca->id); ?>" <?php echo e(request('marca_id') == $marca->id ? 'selected' : ''); ?>><?php echo e($marca->nombre); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit" class="vx-btn vx-btn-primary"><i class="bi bi-search"></i></button>
    <?php if(request()->anyFilled(['search','marca_id'])): ?><a href="<?php echo e(route('campanias.index')); ?>" class="vx-btn vx-btn-secondary">Limpiar</a><?php endif; ?>
</form>
<?php if($campanias->count() > 0): ?>
    <?php $__currentLoopData = $campanias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campania): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="vx-card" style="margin-bottom:16px;">
        <div class="vx-card-header" style="display:flex;justify-content:space-between;align-items:center;">
            <div>
                <h4 style="margin:0;"><?php echo e($campania->nombre); ?></h4>
                <div style="font-size:12px;color:var(--vx-text-muted);margin-top:2px;">
                    <span class="vx-badge" style="background:<?php echo e($campania->marca->color); ?>20;color:<?php echo e($campania->marca->color); ?>;"><?php echo e($campania->marca->nombre); ?></span>
                    <?php if($campania->fecha_inicio): ?> <?php echo e($campania->fecha_inicio->format('d/m/Y')); ?> <?php endif; ?>
                    <?php if($campania->fecha_fin): ?> — <?php echo e($campania->fecha_fin->format('d/m/Y')); ?> <?php endif; ?>
                    <?php if($campania->activa): ?><span class="vx-badge vx-badge-success">Activa</span><?php else: ?><span class="vx-badge vx-badge-gray">Inactiva</span><?php endif; ?>
                    · <?php echo e($campania->fotos->count()); ?> foto(s)
                </div>
            </div>
            <div class="vx-actions"><button class="vx-actions-toggle"><i class="bi bi-three-dots-vertical"></i></button><div class="vx-actions-menu">
                <a href="<?php echo e(route('campanias.show', $campania)); ?>"><i class="bi bi-eye" style="color:var(--vx-info);"></i> Ver</a>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar campanias')): ?><a href="<?php echo e(route('campanias.edit', $campania)); ?>"><i class="bi bi-pencil" style="color:var(--vx-warning);"></i> Editar</a><?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminar campanias')): ?>
                <form action="<?php echo e(route('campanias.destroy', $campania)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar campaña y todas sus fotos?');">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="act-danger"><i class="bi bi-trash"></i> Eliminar</button>
                </form>
                <?php endif; ?>
            </div></div>
        </div>
        <?php if($campania->fotos->count() > 0): ?>
        <div class="vx-card-body" style="padding:12px;">
            <div class="cmp-carousel" data-cmp-carousel="<?php echo e($campania->id); ?>">
                <div class="cmp-track" id="cmpTrack<?php echo e($campania->id); ?>">
                    <?php $__currentLoopData = $campania->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cmp-slide">
                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($foto->ruta)); ?>" alt="<?php echo e($foto->nombre_original); ?>" class="cmp-image">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($campania->fotos->count() > 1): ?>
                <button class="cmp-arrow cmp-prev" type="button" onclick="moveCampaniaSlide(<?php echo e($campania->id); ?>, -1)" aria-label="Foto anterior">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="cmp-arrow cmp-next" type="button" onclick="moveCampaniaSlide(<?php echo e($campania->id); ?>, 1)" aria-label="Siguiente foto">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <div class="cmp-dots" id="cmpDots<?php echo e($campania->id); ?>">
                    <?php $__currentLoopData = $campania->fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="cmp-dot <?php echo e($loop->first ? 'active' : ''); ?>" type="button" onclick="goCampaniaSlide(<?php echo e($campania->id); ?>, <?php echo e($loop->index); ?>)"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div style="padding:8px 0;"><?php echo e($campanias->links('vendor.pagination.vexis')); ?></div>
<?php else: ?>
    <div class="vx-card"><div class="vx-card-body"><div class="vx-empty"><i class="bi bi-megaphone"></i><p>No se encontraron campañas.</p></div></div></div>
<?php endif; ?>
<?php $__env->startPush('styles'); ?>
<style>
.cmp-carousel { position: relative; overflow: hidden; border-radius: 8px; background: var(--vx-gray-100); }
.cmp-track { display: flex; transition: transform 0.35s ease; }
.cmp-slide { min-width: 100%; height: 180px; display: flex; align-items: center; justify-content: center; }
.cmp-image { width: 100%; height: 100%; object-fit: cover; }
.cmp-arrow { position: absolute; top: 50%; transform: translateY(-50%); width: 34px; height: 34px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.7); background: rgba(0,0,0,0.45); color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 2; }
.cmp-prev { left: 10px; }
.cmp-next { right: 10px; }
.cmp-arrow:hover { background: rgba(0,0,0,0.62); }
.cmp-dots { position: absolute; left: 50%; bottom: 8px; transform: translateX(-50%); display: flex; gap: 6px; }
.cmp-dot { width: 7px; height: 7px; border-radius: 50%; border: none; background: rgba(255,255,255,0.55); cursor: pointer; padding: 0; }
.cmp-dot.active { width: 18px; border-radius: 4px; background: #fff; }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
const campaniaSlides = {};

function updateCampaniaSlide(campaniaId) {
    const track = document.getElementById(`cmpTrack${campaniaId}`);
    if (!track) return;

    const index = campaniaSlides[campaniaId] ?? 0;
    track.style.transform = `translateX(-${index * 100}%)`;

    const dots = document.querySelectorAll(`#cmpDots${campaniaId} .cmp-dot`);
    dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
}

function goCampaniaSlide(campaniaId, index) {
    const total = document.querySelectorAll(`#cmpTrack${campaniaId} .cmp-slide`).length;
    if (!total) return;

    campaniaSlides[campaniaId] = ((index % total) + total) % total;
    updateCampaniaSlide(campaniaId);
}

function moveCampaniaSlide(campaniaId, step) {
    const current = campaniaSlides[campaniaId] ?? 0;
    goCampaniaSlide(campaniaId, current + step);
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/mengf/Vexis_f/Vexis/resources/views/campanias/index.blade.php ENDPATH**/ ?>