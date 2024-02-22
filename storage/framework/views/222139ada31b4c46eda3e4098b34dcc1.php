<link rel="stylesheet" href="../../css/list_resa.css">

<h2>Les réservations</h2>
<div class="main">
    <div class="recherche">
        <form class="recherche-resa" method="get" action="<?php echo e(route('reservations')); ?>">
            <?php echo csrf_field(); ?>
            <label>Semaine</label>
            <select name="semaine">
                <?php $__currentLoopData = $semaine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $se): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($se->DATEDEBSEM); ?>" <?php echo e(request('semaine') == $se->DATEDEBSEM ? 'selected' : ''); ?>><?php echo e($se->DATEDEBSEM); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label>Par utilisateur</label>
            <select name="id">
                <option value="">Tous</option>
                <?php $__currentLoopData = $utilisateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilisateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($utilisateur->id); ?>" <?php echo e(request('id') == $utilisateur->id ? 'selected' : ''); ?>><?php echo e($utilisateur->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <label>Hébergement</label>
            <select name="NOHEB">
                <option value="">Tous</option>
                <?php $__currentLoopData = $hebergements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hebergement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($hebergement->NOHEB); ?>" <?php echo e(request('NOHEB') == $hebergement->NOHEB ? 'selected' : ''); ?>><?php echo e($hebergement->NOMHEB); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button class="btn-list-resa" type="submit">Rechercher</button>
        </form>
    </div>


    <div class="reservations">
        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="reservation">
                <p class="p-list-resa">N° de réservation : <?php echo e($reservation->NORESA); ?></p>
                <p class="p-list-resa">Loué par : <?php echo e($reservation->user->name); ?> l'id n° <?php echo e($reservation->id); ?></p>
                <p class="p-list-resa">Numéro d'hébergement : <?php echo e($reservation->NOHEB); ?></p>
                <a class="a-list-resa" href="<?php echo e(route('reservationDetail', ['noresa' => $reservation->NORESA])); ?>">Voir plus de détails</a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->TYPECOMPTE == 'ges' && \Carbon\Carbon::parse($reservation->DATEDEBSEM)->gt(\Carbon\Carbon::now())): ?>
                        <a class="a-list-resa" href="<?php echo e(route('modificationReservation', ['noresa' => $reservation->NORESA])); ?>">Modifier</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vacancesvva\resources\views/reservations/listReservations.blade.php ENDPATH**/ ?>